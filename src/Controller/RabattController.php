<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Rabatt;
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

    //TODO: {id} nach .json verschieben

    /**
     * @Route("/api/{id}/rabatt.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function GET_Rabatt_API(int $id, Request $request, SerializerInterface $serializer): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'GET') {
                if ($id < 0) {
                    $data = $this->getDoctrine()->getRepository(Rabatt::class)->findAll();
                    return new Response($serializer->serialize($data, 'json'), 200);
                } else {
                    $data = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['FK_Firma_ID' => $id]); //Hier umändern
                    return new Response($serializer->serialize($data, 'json'), 200);
                }
            }
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);

                $fk_firma_id = $data["fk_firma_id"];
                $beschreibung = $data["beschreibung"];
                $rabttbeschreibung = $data["rabattBeschreibung"];
                $datei = $data["datei"];
                $XEuro = $data["XEuro"];


                if ($this->saveRabatt($fk_firma_id, $beschreibung, $datei, $XEuro, $rabttbeschreibung) == true) {
                    return new Response("1", 200);
                }
            }
        }
    }
}
