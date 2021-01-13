<?php

namespace App\Controller;

use App\Entity\Design;
use App\Entity\DesignZuweisung;
use App\Entity\Firma;
use App\Entity\Qrcode;
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
//        return $this->render('design/index.html.twig', [
//            'controller_name' => 'DesignController',
//        ]);
//    }

    /**
     * @Route("/api/design.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function Save_Design(Request $request, SerializerInterface $serializer): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
                if (isset($data['name'])) $name = $data['name']; else $name = null; //z.B.: Logo
//                $datei = $data['datei'];
//                $firmenname = $data['firmenname'];
//                $typ = $data['typ'];

                $datei = "PLATZHALTER FÜR EIN BILD";
                $firmenname = "Schnitzelbude1337";
                $typ = "Logo";

                $FirmaDB = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
                if (count($FirmaDB) < 1) return new Response("-1 Firma nicht gefunden", 404);
                if (count($FirmaDB) > 1) return new Response("-1 zu viele Firmen gefunden", 400);


                $entityManager = $this->getDoctrine()->getManager();

                $DESIGN = new Design();
                $DESIGN->setName($firmenname);
                $DESIGN->setDatei($datei);

                $entityManager->persist($DESIGN);
                $entityManager->flush();

                $firmaID = $FirmaDB[0]->getID();
                $designID = $DESIGN->getId();

                $ZUWEISUNG = new DesignZuweisung();
                $ZUWEISUNG->setFKDesignID($designID);
                $ZUWEISUNG->setFKFirmaID($firmaID);

                $entityManager->persist($ZUWEISUNG);
                $entityManager->flush();


                return new Response("1", 200);
            }

            if ($request->getMethod() == 'GET') {
                $data = json_decode($request->getContent(), true);
                $firmenname = $data['firmenname'];

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
            }
        }
    }
}