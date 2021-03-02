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
        return $this->render('standort/index.php.twig', [
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
     * @Route("/api/saveBetrieb")
     * @param Request $request
     * @return Response
     */
    public function POST_FIRMA_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        // Return JSON
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $firmaID = $data["firma"];
            $addresse = $data["addresse"];
            $Ort = $data["Ort"];
            $PLZ = $data["PLZ"];
            $laengengrad = $data["laengengrad"] ?? null;
            $breitengrad = $data["breitengrad"] ?? null;

            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Invalid Authwntification token', 403);
            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['id' => $firmaID])[0];
            $RECHTE = $jsonAuth->returnRechteFromHash($data['hash'], $FIRMA->getFirmanname());
            if ($RECHTE >= 2) {
                $saved = $this->save($firmaID, $addresse, $Ort, $PLZ, $laengengrad, $breitengrad);
            } else return new Response("You do not have the rights to do this action. Please ask the owner to give you permission.", 400);

            if ($saved == false) {
                return new Response($saved, 200);
            } else {
                return new Response("-1 Firma", 400);
            }
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/getBetrieb")
     * @param Request $request
     * @return Response
     */
    public function GET_Betrieb_From_Firma_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        // Return JSON
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);

            $firmaID = $data["FirmaID"] ?? null;
            $erg = array();
            if (isset($firmaID)) {
                $dataDB = $this->getDoctrine()->getRepository(Betrieb::class)->findBy(['FK_Firma_ID' => $firmaID]);
            } else {
                $dataDB = $this->getDoctrine()->getRepository(Betrieb::class)->findAll();
            }
            foreach ($dataDB as $db) {
                $dataErg = [
                    'id' => $db->getID(),
                    'address' => $db->getAddresse() . ", " . $db->getPLZ() . " " . $db->getOrt(),
                    'coords' => [$db->getLaengengrad(), $db->getBreitengrad()],
                    'open' => [
                        'Monday' => "XD",
                        "Tuesday" => "XD",
                        'Wednesday' => "XD,",
                        'Thursday' => "XD",
                        'Friday' => "XD",
                        'Saturday' => "XD",
                        'Sunday' => "XD"
                    ],
                    'image' => null
                ];
                array_push($erg, $dataErg);
            }


            return new Response($serializer->serialize($erg, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

}
