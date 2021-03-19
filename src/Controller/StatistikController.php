<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Statistik;
use App\Service\Hash;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class StatistikController extends AbstractController {

    /**
     * @Route("/api/writeStatistik")
     * @param Request $request
     * @return Response
     */
    public function Save_Statistik(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $type = ["eingescannt", "gekauft", "eingelöst", "aufruf"];
//        $type = ["gekauft", "eingescannt", "aufruf"];
        $erg = array();
        foreach ($type as $item) {
            for ($i = 0; $i <= 8; $i++) {
                for ($ii = 0; $ii < rand(0, 100); $ii++) {
                    if (rand(0, 5) != 2) {
                        $STATISTIK = new Statistik();
                        $STATISTIK->setFKFirmaID(1);
                        $STATISTIK->setType($item);
                        $STATISTIK->setDate(new DateTime($ii . " days ago"));
                        array_push($erg, $STATISTIK);

                        $entityManager->persist($STATISTIK);
                        $entityManager->flush();
                    }
                }
            }
        }
        return new Response($serializer->serialize($erg, 'json'), 200);
    }


    /**
     * @Route("/api/getStatistik")
     * @param Request $request
     * @return Response
     */
    public function GET_Statistik(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $data['hash'] = $data['hash'] ?? "ttgIeo6YNCoDg3YoJNUlMy868vhWBblZv6z4Ki61pEV3ATcWiqr4aZPPLiu19MfNHl5wa48tnJM6l2N7iAJumg7mnw6z0kGIhGtS";
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Token invalid', 403);
            $user = $jsonAuth->returnUserFromHash($data['hash'])['user'];
            $firmen = $jsonAuth->returnFirmenFromHash($data['hash']);
            $final = [];


            /** @var Firma $firma */
            foreach ($firmen as $firma) {
                $eingescanned = array();
                $gekauft = array();
                $eingeloest = array();
                $aufrufe = array();
                $STATISTIK = $this->getDoctrine()->getRepository(Statistik::class)->findBy(['FK_Firma_ID' => $firma->getId()]);
                /** @var Statistik $stat */
                foreach ($STATISTIK as $stat) {
                    if ($stat->getType() == "eingescannt") {
                        array_push($eingescanned, $stat);
                    }
                    if ($stat->getType() == "gekauft") {
                        array_push($gekauft, $stat);
                    }
                    if ($stat->getType() == "eingelöst") {
                        array_push($eingeloest, $stat);
                    }
                    if ($stat->getType() == "aufruf") {
                        array_push($aufrufe, $stat);
                    }
                }

                $erg = [
                    'scanned' => $this->sortDates($eingescanned),
                    'bought' => $this->sortDates($gekauft),
                    'used' => $this->sortDates($eingeloest),
                    'opened' => $this->sortDates($aufrufe)
                ];
                $final [$firma->getFirmanname()] = $erg;
            }

            return new Response($serializer->serialize($final, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

    private function sortDates($eingescanned) {
        $dates = [
            [new DateTime("0 days ago"), 0],
            [new DateTime("1 days ago"), 0],
            [new DateTime("2 days ago"), 0],
            [new DateTime("3 days ago"), 0],
            [new DateTime("4 days ago"), 0],
            [new DateTime("5 days ago"), 0],
            [new DateTime("6 days ago"), 0],
            [new DateTime("7 days ago"), 0]
        ];


        foreach ($eingescanned as $statistik) {
            switch ($statistik->getDate()->format("Y-m-d")) {

                case $dates[0][0]->format("Y-m-d"):
                    $dates[0][1]++;
                    break;
                case $dates[1][0]->format("Y-m-d"):
                    $dates[1][1]++;
                    break;
                case $dates[2][0]->format("Y-m-d"):
                    $dates[2][1]++;
                    break;
                case $dates[3][0]->format("Y-m-d"):
                    $dates[3][1]++;
                    break;
                case $dates[4][0]->format("Y-m-d"):
                    $dates[4][1]++;
                    break;
                case $dates[5][0]->format("Y-m-d"):
                    $dates[5][1]++;
                    break;
                case $dates[6][0]->format("Y-m-d"):
                    $dates[6][1]++;
                    break;
                case $dates[7][0]->format("Y-m-d"):
                    $dates[7][1]++;
                    break;
            }
            if (isset($dates[8])) {
                $dates[8][0]->format("Y-M-D");
                $dates[8][1]++;
            }

        }

        $dates[0][0] = $dates[0][0]->format('Y-m-d');
        $dates[1][0] = $dates[1][0]->format('Y-m-d');
        $dates[2][0] = $dates[2][0]->format('Y-m-d');
        $dates[3][0] = $dates[3][0]->format('Y-m-d');
        $dates[4][0] = $dates[4][0]->format('Y-m-d');
        $dates[5][0] = $dates[5][0]->format('Y-m-d');
        $dates[6][0] = $dates[6][0]->format('Y-m-d');
        $dates[7][0] = $dates[7][0]->format('Y-m-d');
        if (isset($dates[8])) {
            $dates[8][0] = $dates[8][0]->format('Y-m-d');
        }
        return $dates;
    }
}
