<?php

namespace App\Controller;

use App\Entity\UserRabatte;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserRabattController extends AbstractController {
    /**
     * @Route("/user/rabatt", name="user_rabatt")
     */
//    public function index() {
//        return $this->render('user_rabatt/index.html.twig', [
//            'controller_name' => 'UserRabattController',
//        ]);
//    }

    /**
     * @Route("/api/Userrabatte.{_format}", format="html", requirements={ "_format": "html|json"})
     * @param Request $request
     * @return Response
     */
    public function GET_Userrabatte_API(Request $request, SerializerInterface $serializer): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
                $id = $data['id'];

                if ($id < 0) {
                    $data = $this->getDoctrine()->getRepository(UserRabatte::class)->findAll();
                    return new Response($serializer->serialize($data, 'json'), 200);
                } else {
                    $data = $this->getDoctrine()->getRepository(UserRabatte::class)->findBy(['FK_User_ID' => $id]); //Hier umändern
                    return new Response($serializer->serialize($data, 'json'), 200);
                }
            }
        }
    }

    /**
     * @Route("/api/Userrabatte/use.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function Use_Userrabatte_API(Request $request, SerializerInterface $serializer): Response {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'PUT') {
                $data = json_decode($request->getContent(), true);
                $code = $data["code"];

                $entityManager = $this->getDoctrine()->getManager();
                $Rabatt = $this->getDoctrine()->getRepository(UserRabatte::class)->find(["Rabatt_Code" => $code]);
                if ($Rabatt == 0) return new Response("-1 NotFound", 400);
                if ($Rabatt >= 2) return new Response("-1 tooMany", 400);
                if ($Rabatt->getUsed() == true) return new Response("-1 used", 400);

                $Rabatt->setUsed(true);

                $entityManager->persist($Rabatt);
                $entityManager->flush();

                return new Response('1', 200);
            }
        }
    }
}
