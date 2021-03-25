<?php

namespace App\Controller;

use App\Entity\Design;
use App\Entity\DesignZuweisung;
use App\Entity\Firma;
use App\Entity\Qrcode;
use App\Service\Hash;
use Cassandra\Blob;
use Doctrine\DBAL\Types\BlobType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class DesignController extends AbstractController {
    /**
     * @Route("/design", name="design")
     */
//    public function index() {
//        return $this->render('design/index.php.twig', [
//            'controller_name' => 'DesignController',
//        ]);
//    }

    /**
     * @Route("/api/saveDesign")
     * @param Request $request
     * @return Response
     */
    public function Save_Design(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            if (isset($data['name'])) $name = $data['name']; else $name = null; //z.B.: Logo
            $datei = $data['datei'] ?? null;
            $firmenname = $data['companyName'];
            $StringDesign = $data['farbcode'] ?? null;
            if (isset($StringDesign)) {
                $typ = "Farbe";
            } else {
                $typ = $data['typ'];
            }
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);


//                $datei = "PLATZHALTER FÜR EIN BILD";
//                $firmenname = "Schnitzelbude1337";
//                $typ = "Logo";

            $FirmaDB = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FirmaDB) < 1) return new Response("-1 Firma nicht gefunden", 404);
            if (count($FirmaDB) > 1) return new Response("-1 zu viele Firmen gefunden", 400);
            if (!isset($datei) && !isset($StringDesign)) return new Response("You have to provide some kind of Design");


            $entityManager = $this->getDoctrine()->getManager();

            $RECHTE = $jsonAuth->returnRechteFromHash($data['hash'], $firmenname);
            if ($RECHTE >= 2) {

                $DESIGN = new Design();
                $DESIGN->setName($firmenname);
                $DESIGN->setDatei($datei);
                $DESIGN->setTyp($typ);
                $DESIGN->setStingDatei($StringDesign);

                $entityManager->persist($DESIGN);
                $entityManager->flush();

                $firmaID = $FirmaDB[0]->getID();
                $designID = $DESIGN->getId();

                $ZUWEISUNG = new DesignZuweisung();
                $ZUWEISUNG->setFKDesignID($designID);
                $ZUWEISUNG->setFKFirmaID($firmaID);


                $entityManager->persist($ZUWEISUNG);
                $entityManager->flush();

                return new Response($serializer->serialize(['design' => $DESIGN, 'designID' => $designID], 'json'), 400);
            } else {
                return new Response("You do not have the rights to do this action. Please ask the owner to give you permission.", 400);
            }

            $erg = [
                'rechte' => $RECHTE,
                'design' => $DESIGN,
                'firma' => $FirmaDB
            ];

            return new Response($serializer->serialize($erg, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/getDesign")
     * @param Request $request
     * @return Response
     */
    public function GET_Design(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $firmenname = $data['firmenname'];
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);

            $FirmaDB = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FirmaDB) < 1) return new Response("-1 Firma nicht gefunden", 404);
            if (count($FirmaDB) > 1) return new Response("-1 zu viele Firmen gefunden", 400);

            $DesignZuweisungDB = $this->getDoctrine()->getRepository(DesignZuweisung::class)->findBy(['FK_Firma_ID' => $FirmaDB[0]->getID()]);
            $Designs = [];
            foreach ($DesignZuweisungDB as $db) {
                $DesignDB = $this->getDoctrine()->getRepository(Design::class)->findBy(['id' => $db->getFKDesignID()]);
                array_push($Designs, $DesignDB[0]);
            }

            return new Response($serializer->serialize($Designs, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }
}