<?php

namespace App\Controller;

use App\Entity\Punkte;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PunkteController extends AbstractController {
    /**
     * @Route("/punkte", name="punkte")
     */
//    public function index() {
//        return $this->render('punkte/index.html.twig', [
//            'controller_name' => 'PunkteController',
//        ]);
//    }

    /**
     * @Route("/api/GetPunkte.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param Hash $jsonAuth
     * @return Response
     */
    public function GET_Punkte_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
                if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);
                $id = $data['UserID'];
                isset($data['FirmaID']) ? $firmaID = $data['FirmaID'] : $firmaID = null;
//               $id = 1;

                if ($id < 0) {
                    $data = $this->getDoctrine()->getRepository(Punkte::class)->findAll();
                    return new Response($serializer->serialize($data, 'json'), 200);
                } else {
                    if (isset($firmaID)) {
                        $data = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_User_ID' => $id, 'FK_Firma_ID' => $firmaID]); //Hier umändern

                        return new Response($serializer->serialize($data, 'json'), 200);
                    } else {
                        $data = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_User_ID' => $id]); //Hier umändern
                        return new Response($serializer->serialize($data, 'json'), 200);

                    }
                }
            }
        } else {
            return new Response("", 404);
        }
    }

}
