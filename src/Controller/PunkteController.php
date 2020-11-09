<?php

namespace App\Controller;

use App\Entity\Punkte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PunkteController extends AbstractController {
    /**
     * @Route("/punkte", name="punkte")
     */
    public function index() {
        return $this->render('punkte/index.html.twig', [
            'controller_name' => 'PunkteController',
        ]);
    }

    /**
     * @Route("/api/{id}/punkte.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function GET_Punkte_API(int $id, Request $request, SerializerInterface $serializer): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'GET') {

                if ($id < 0) {
                    $data = $this->getDoctrine()->getRepository(Punkte::class)->findAll();
                    return new Response($serializer->serialize($data, 'json'));
                } else {
                    $data = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_User_ID' => $id]); //Hier umändern
                    return new Response($serializer->serialize($data, 'json'));
                }
            }
            if ($request->getMethod() == 'POST') {
                return new Response('-1');
            }
        }
        return new Response(
            '<html><body>Some HTML Response</body></html>'
        );
    }

}
