<?php

namespace App\Controller;

use App\Entity\Betrieb;
use App\Entity\Firma;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

    private function save($firmaID, $addresse, $Ort, $PLZ) {
        $entityManager = $this->getDoctrine()->getManager();
        if (count($this->getDoctrine()->getRepository(Firma::class)->findBy(['id' => $firmaID])) != 1) return false;

        $Firma = new Betrieb();
        $Firma->setFKFirmaID($firmaID);
        $Firma->setAddresse($addresse);
        $Firma->setOrt($Ort);
        $Firma->setPLZ($PLZ);

        $entityManager->persist($Firma);
        $entityManager->flush();

        return true;
    }

    /**
     * @Route("/api/betrieb.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function POST_GET_FIRMA_API(Request $request, SerializerInterface $serializer): Response {
        // Return JSON
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'GET') {
                $data = $this->getDoctrine()->getRepository(Betrieb::class)->findAll();
                return new Response($serializer->serialize($data, 'json'));
//                return new Response("GET");
            }
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);

                $firmaID = $data["firma"];
                $addresse = $data["addresse"];
                $Ort = $data["Ort"];
                $PLZ = $data["PLZ"];

                if ($this->save($firmaID, $addresse, $Ort, $PLZ) == true) {
                    return new Response("1");
                } else {
                    return new Response("-1 Firma");
                }
            }
        }

        // Return HTML
        return new Response(
            '<html><body>Some HTML Response</body></html>'
        );
    }
}
