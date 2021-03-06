<?php

namespace App\Controller;

use App\Entity\Angestellte;
use App\Entity\Design;
use App\Entity\DesignZuweisung;
use App\Entity\Firma;
use App\Entity\Punkte;
use App\Entity\Statistik;
use App\Entity\User;
use App\Service\clean;
use App\Service\Hash;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FirmaController extends AbstractController {

    //4 Rechte Stufen:
    /**
     * 0: Kunde
     * 1: Angestellte
     * 2: Verwalter
     * 3: Owner
     */


    private function save($owner, $name, $kontakt, $XEuro, $logo, $domain) {
        $entityManager = $this->getDoctrine()->getManager();

        $Firma = new Firma();
        $Firma->setFKUserIDOwner($owner);
        $Firma->setFirmanname($name);
        $Firma->setKontaktEmail($kontakt);
        $Firma->setXEuroFuer1Punkt($XEuro);
        $Firma->setDatei($logo);
        $Firma->setDomain($domain);

        $entityManager->persist($Firma);
        $entityManager->flush();

        $ANGESTELLTER = new Angestellte();
        $ANGESTELLTER->setFKUserID($owner);
        $ANGESTELLTER->setFKFimraID($Firma->getId());
        $ANGESTELLTER->setRechte(3);

        $entityManager->persist($ANGESTELLTER);
        $entityManager->flush();

        return true;
    }

    /**
     * @Route("/api/registerCompany")
     * @param Request $request
     * @return Response
     */
    public function SAVE_FIRMA_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth, clean $clean): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Hash Invalid', 403);
            $user = $jsonAuth->returnUserFromHash($data['hash'])['user'];

            $owner = $user->getID();
            $name = strtolower($data["name"]);
            $kontakt = $data["email"] ?? null;
            $XEuro = $data["conversionRate"] ?? 10;
            $logo = $data["logo"] ?? null;
            $domain = strtolower($clean->cleanString($name));


            $Firmen = $this->getDoctrine()->getRepository(Firma::class)->findAll();
            $exists = 0;
            foreach ($Firmen as $firm) {
                if ($firm->getFirmanname() == $name) $exists = "-1 Firmenname";
                if ($firm->getDomain() == $domain) $exists = "-1 Domain";

            }

            if ($exists != 0) {
                if ($exists == "-1 Firmenname") return new Response("This name is already in use", 400);
                if ($exists == "-1 Domain") return new Response("This Domain is already in use", 400);
            } else {
                if ($this->save($owner, $name, $kontakt, $XEuro, $logo, $domain) == true) {
                    return new Response($domain, 200);
                } else {
                    return new Response("Please fill out everything", 100);
                }
            }
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/getCompany")
     * @param Request $request
     * @return Response
     */
    public function GET_FIRMA_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth, clean $clean): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
//            if (!isset($data['hash'])) return new Response("Please provide a usertoken", 404);
//            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Hash Invalid', 403);
            $hash = $data['hash'] ?? null;
            if (isset($hash)) {
                $user = $jsonAuth->returnUserFromHash($data['hash'])['user'];
            }
            $firmenname = strtolower($data['companyName']) ?? null;

            if (!isset($firmenname)) {
                $Firmen = $this->getDoctrine()->getRepository(Firma::class)->findAll();
                $FIRMA = $Firmen[0];

                $tmperg = array();
                foreach ($Firmen as $firma) {
                    $DESIGNZUWEISUNG = $this->getDoctrine()->getRepository(DesignZuweisung::class)->findBy(['FK_Firma_ID' => $firma->getId()]);
                    $DESIGN = $this->getDoctrine()->getRepository(Design::class)->findBy(['id' => $DESIGNZUWEISUNG->getFKDesignID()]);
                    $farbe = array();
                    $designs = array();
                    foreach ($DESIGN as $design) {
                        $tmp = [
                            "type" => $design->getTyp(),
                            "file" => $design->getDatei(),
                            "color" => $design->getStingDatei()
                        ];
                        if ($design->getTyp() == "Farbe") {
                            $farbe[0] = $design->getStingDatei();
                        }
                        array_push($designs, $tmp);
                    }
                    if (count($farbe) == 0) $farbe[0] = '["#10cdb7","#2c3e50","#fafafa","#ffffff"]';
                    $tmperg = [
                        'owner' => $firma->getId(),
                        'companyName' => $firma->getFirmanname(),
                        'contactMail' => $firma->getKontaktEmail(),
                        'conversionRate' => $firma->getXEuroFuer1Punkt(),
                        'domain' => $firma->getDomain(),
                        'files' => $designs,
                        'design' => [
                            'logo' => $firma->getDatei(),
                            'design' => $farbe[count($farbe) - 1]
                        ]
                    ];
                    $name = $firma->getFirmanname();
                    $erg[$name] = $tmperg;
                }

            }
            if (isset($firmenname)) {
                $firma = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Domain' => $clean->cleanString($firmenname)]);
                if (count($firma) == 0) return new Response("The company was not found", 404);
                $firma = $firma[0];
                $DESIGNZUWEISUNG = $this->getDoctrine()->getRepository(DesignZuweisung::class)->findBy(['FK_Firma_ID' => $firma->getId()]);
//                if (count($DESIGNZUWEISUNG) == 0) {
//                    $DESIGN = [];
//                } else {
                $DESIGN = array();
                foreach ($DESIGNZUWEISUNG as $dz) {
                    $DESIGNS = $this->getDoctrine()->getRepository(Design::class)->findBy(['id' => $dz->getFKDesignID()])[0];
                    array_push($DESIGN, $DESIGNS);
                }
//                }
                $farbe = array();
                array_push($farbe, '["#10cdb7","#2c3e50","#fafafa","#ffffff"]');
                $designs = array();
                /** @var Design $design */
                foreach ($DESIGN as $design) {
                    if ($design->getTyp() == "Farbe") {
                        array_push($farbe, $design->getStingDatei());
                    } else {
                        $tmp = [
                            "type" => $design->getTyp(),
                            "file" => $design->getDatei(),
                            "color" => $design->getStingDatei()
                        ];
                        array_push($designs, $tmp);
                    }
                }

                $erg['company'] = [
//                    'id' => $firma->getId(),
                    'companyName' => $firma->getFirmanname(),
                    'contactMail' => $firma->getKontaktEmail(),
                    'conversionRate' => $firma->getXEuroFuer1Punkt(),
                    'domain' => $firma->getDomain(),
                    'files' => $designs,
                    'design' => [
                        'logo' => $firma->getDatei(),
                        'colorPalette' => $farbe[count($farbe) - 1],
//                        'paletteLength' => count($farbe),
//                        'designLength' => count($DESIGN),
//                        'designzuweisungLength' => count($DESIGNZUWEISUNG)
                    ]

                ];
            }

            $STATISTIK = new Statistik();
            $STATISTIK->setDate(new DateTime("0 days ago"));
            $STATISTIK->setType("opened");
            $STATISTIK->setFKFirmaID($firma->getId());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($STATISTIK);
            $entityManager->flush();

            return new Response($serializer->serialize($erg, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/updateCompany")
     * @param Request $request
     * @return Response
     */
    public function Update_FIRMA_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth, clean $clean): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $entityManager = $this->getDoctrine()->getManager();
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Token Invalid', 403);
            $user = $jsonAuth->returnUserFromHash($data['hash'])['user'];

            $hash = $data['hash'];
            $logo = $data['logo'] ?? null;
            $firmenname = $data['companyName'] ?? null;
            $email = $data['email'] ?? null;
            $conversionRate = $data['conversionRate'] ?? null;


            if (!isset($firmenname)) return new Response("Which company do you want to edit?", 400);
            /** @var Firma $firma */
            $firma = $jsonAuth->returnFirmenFromHash($hash, $firmenname);
            if (count($firma) == 0) return new Response("company not found");
            $firma = $firma[0];

            if (isset($logo)) $firma->setDatei($logo);
            if (isset($email)) $firma->setKontaktEmail($email);
            if (isset($conversionRate)) $firma->setXEuroFuer1Punkt($conversionRate);

            $RECHTE = $jsonAuth->returnRechteFromHash($data['hash'], $firmenname);
            if ($RECHTE == 3) {
                $entityManager->persist($firma);
                $entityManager->flush();
            } else return new Response("You do not have the rights to edit this company. Please ask the owner.", 400);

            return new Response("successful", 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/deleteCompany")
     * @param Request $request
     * @return Response
     *
     */
    public function DELETE_Firma_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $hash = $data['hash'];
            if (!isset($hash)) return new Response("Please provide a token", 400);
            $passwort = $data['password'];
            $firmenname = $data['companyName'];

            $user = $jsonAuth->returnUserFromHash($hash)['user'];
            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("Firma not found", 400);
            $FIRMA = $FIRMA[0];
            if (password_verify($passwort, $user->getPassword())) {
                $entityManager = $this->getDoctrine()->getManager();

                $ANGESTELLTER = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_Fimra_ID' => $FIRMA->getID()]);
                foreach ($ANGESTELLTER as $an) {
                    $entityManager->remove($an);
                }

                $entityManager->remove($FIRMA);
                $entityManager->flush();
            }
            return new Response("successful", 200);
        }
    }

}
