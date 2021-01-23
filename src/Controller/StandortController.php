<?php

namespace App\Controller;

use App\Entity\Betrieb;
use App\Entity\Firma;
use App\Service\Hash;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class StandortController extends AbstractController {
    /**
     * @Route("/standort", name="standort")
     */
    public function index() {
        return $this->render('standort/index.html.twig', [
            'controller_name' => 'StandortController',
        ]);
    }

    private function save($firmaID, $addresse, $Ort, $PLZ, $laengengrad, $breitengrad) {
        $entityManager = $this->getDoctrine()->getManager();
        $return = array();
        if (count($this->getDoctrine()->getRepository(Firma::class)->findBy(['id' => $firmaID])) != 1) return false;

        $Firma = new Betrieb();
        $Firma->setFKFirmaID($firmaID);
        $Firma->setAddresse($addresse);
        $Firma->setOrt($Ort);
        $Firma->setPLZ($PLZ);
        $Firma->setLaengengrad($laengengrad);
        $Firma->setBreitengrad($breitengrad);

        $entityManager->persist($Firma);
        $entityManager->flush();

        return $Firma;
    }

    /**
     * @Route("/api/SaveBetrieb.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function POST_GET_FIRMA_API(Request $request, SerializerInterface $serializer): Response {
        // Return JSON
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);

                $firmaID = $data["firma"];
                $addresse = $data["addresse"];
                $Ort = $data["Ort"];
                $PLZ = $data["PLZ"];
                if (isset($data["laengengrad"])) $laengengrad = $data["laengengrad"]; else $laengengrad = null;
                if (isset($data["breitengrad"])) $breitengrad = $data["breitengrad"]; else $breitengrad = null;

                $saved = $this->save($firmaID, $addresse, $Ort, $PLZ, $laengengrad, $breitengrad);
                if ($saved == false) {
                    return new Response($saved, 200);
                } else {
                    return new Response("-1 Firma", 400);
                }
            }
        }
    }

    /**
     * @Route("/api/GetBetrieb.{_format}", format="html", requirements={ "_format": "json" })
     * @param Request $request
     * @return Response
     */
    public function GET_Betrieb_From_Firma_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        // Return JSON
        if ($request->getRequestFormat() == 'json') {
            /*if ($request->getMethod() == 'GET') {
                $data = $this->getDoctrine()->getRepository(Betrieb::class)->findAll();
                return new Response($serializer->serialize($data, 'json'), 200);
//                return new Response("GET");
            }*/
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
                if (!$jsonAuth->checkJsonCode($data['UserID'], $data['hash'])) return new Response('-1 invalid', 403);

                $firmaID = $data["Firmenname"];
//                $dataDB = $this->getDoctrine()->getRepository(Firma::class)->findAll();
                $dataDB = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $data]);
                if (count($dataDB) < 1) return new Response("-1 Firma nicht gefunden", 404);
                if (count($dataDB) > 1) return new Response("-1 zu viele Firmen gefunden", 400);

                $id = $dataDB[0]->getID();
                $betriebe = $this->getDoctrine()->getRepository(Betrieb::class)->findBy(['FK_Firma_ID' => $id]);

                return new Response($serializer->serialize($betriebe, 'json'), 200);
            }
        }
    }

}
