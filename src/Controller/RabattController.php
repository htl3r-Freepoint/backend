<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Rabatt;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RabattController extends AbstractController {
    /**
     * @Route("/rabatt", name="rabatt")
     */
//    public function index() {
//        return $this->render('rabatt/index.html.twig', [
//            'controller_name' => 'RabattController',
//        ]);
//    }

    private function saveRabatt($fk_firma_id, $beschreibung, $datei, $XEuro, $rabttbeschreibung) {
        if ($datei == "null" || $datei == "ADD_HERE") $datei = null;

        $entityManager = $this->getDoctrine()->getManager();

        $Firma = new Rabatt();
        $Firma->setFKFirmaID($fk_firma_id);
        $Firma->setBeschreibung($beschreibung);
        $Firma->setDatei($datei);
        $Firma->setRabattbeschreibung($rabttbeschreibung);
        $Firma->setXPunkteFuer1Rabatt($XEuro);

        $entityManager->persist($Firma);
        $entityManager->flush();

        return true;
    }

    /**
     * @Route("/api/GetRabatt)
     * @param Request $request
     * @return Response
     */
    public function GET_Rabatt_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
//                if (!$jsonAuth->checkJsonCode($data['UserID'], $data['hash'])) return new Response('-1 invalid', 403);
                isset($data['FirmaID']) ? $firmaID = $data['FirmaID'] : $firmaID = 1;

                if (isset($firmaID)) {
                    $data = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['FK_Firma_ID' => $firmaID]); //Hier umändern
                    return new Response($serializer->serialize($data, 'json'), 200);
                } else {
                    $data = $this->getDoctrine()->getRepository(Rabatt::class)->findAll(); //Hier umändern
                    return new Response($serializer->serialize($data, 'json'), 200);
                }
            }
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/SaveRabatt)
     * @param Request $request
     * @return Response
     */
    public function POST_Rabatt_API(int $id, Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
                if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);

                $fk_firma_id = $data["fk_firma_id"];
                $beschreibung = $data["beschreibung"];
                $rabttbeschreibung = $data["rabattBeschreibung"];
                $datei = $data["datei"];
                $XEuro = $data["XEuro"];


                if ($this->saveRabatt($fk_firma_id, $beschreibung, $datei, $XEuro, $rabttbeschreibung) == true) {
                    return new Response("1", 200);
                }
            }
        } else {
            return new Response("", 404);
        }
    }
}
