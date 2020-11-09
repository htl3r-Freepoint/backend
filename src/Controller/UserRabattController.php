<?php

namespace App\Controller;

use App\Entity\UserRabatte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserRabattController extends AbstractController {
    /**
     * @Route("/user/rabatt", name="user_rabatt")
     */
    public function index() {
        return $this->render('user_rabatt/index.html.twig', [
            'controller_name' => 'UserRabattController',
        ]);
    }

    /**
     * @Route("/api/{id}/Userrabatte.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function GET_Userrabatte_API(String $id, Request $request, SerializerInterface $serializer): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'GET') {

                if ($id < 0) {
                    $data = $this->getDoctrine()->getRepository(UserRabatte::class)->findAll();
                    return new Response($serializer->serialize($data, 'json'));
                } else {
                    $data = $this->getDoctrine()->getRepository(UserRabatte::class)->findBy(['Rabatt_Code' => $id]); //Hier umändern
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
