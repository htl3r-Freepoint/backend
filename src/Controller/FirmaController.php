<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Punkte;
use App\Entity\User;
use App\Service\clean;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FirmaController extends AbstractController {
    /**
     * @Route("/firma", name="firma")
     */
    public function index() {
        return $this->render('firma/index.html.twig', [
            'controller_name' => 'FirmaController',
        ]);
    }

    private function save($owner, $name, $kontakt, $XEuro, $logo, $domain) {
        $entityManager = $this->getDoctrine()->getManager();

        $Firma = new Firma();
        $Firma->setFKUserIDOwner(null);
        $Firma->setFirmanname($name);
        $Firma->setKontaktEmail($kontakt);
        $Firma->setXEuroFuer1Punkt($XEuro);
        $Firma->setDatei($logo);
        $Firma->setDomain($domain);

        $entityManager->persist($Firma);
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
            $name = $data["name"];
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
                    return new Response("", 200);
                } else {
                    return new Response("Please fill out everything", 100);
                }
            }
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
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Hash Invalid', 403);
            $user = $jsonAuth->returnUserFromHash($data['hash'])['user'];
            $firmenname = $data['companyName'] ?? null;

            if (!isset($firmenname)) {
                $Firmen = $this->getDoctrine()->getRepository(Firma::class)->findBy(['FK_User_ID__Owner' => $user->getID()]);

                $tmperg = array();
                /** @var Firma $firma */
                foreach ($Firmen as $firma) {
                    $tmperg = [
                        'owner' => $firma->getId(),
                        'companyName' => $firma->getFirmanname(),
                        'contactMail' => $firma->getKontaktEmail(),
                        'conversionRate' => $firma->getXEuroFuer1Punkt(),
                        'logo' => $firma->getDatei(),
                        'domain' => $firma->getDomain()
                    ];
                    $name = $firma->getFirmanname();
                    $erg[$name] = $tmperg;
                }

            }
            if (isset($firmenname)) {
                $firma = $this->getDoctrine()->getRepository(Firma::class)->findBy(['FK_User_ID__Owner' => $user->getID(), 'Firmanname' => $firmenname])[0];
                $erg = [
                    'owner' => $firma->getId(),
                    'companyName' => $firma->getFirmanname(),
                    'contactMail' => $firma->getKontaktEmail(),
                    'conversionRate' => $firma->getXEuroFuer1Punkt(),
                    'logo' => $firma->getDatei(),
                    'domain' => $firma->getDomain()
                ];
            }


            return new Response($serializer->serialize($erg, 'json'), 200);
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
            if (!$jsonAuth->checkJsonCode($data['token'])) return new Response('Token Invalid', 403);
            $user = $jsonAuth->returnUserFromHash($data['token'])['user'];

            $hash = $data['token'];
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

            $entityManager->persist($firma);
            $entityManager->flush();

            return new Response("successful", 200);
        }
    }

}
