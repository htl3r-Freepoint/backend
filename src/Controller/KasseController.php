<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Hash;
use Symfony\Component\Serializer\SerializerInterface;

class KasseController extends AbstractController {
    /**
     * @Route("/kasse", name="kasse")
     */
//    public function index()
//    {
//        return $this->render('kasse/index.html.twig', [
//            'controller_name' => 'KasseController',
//        ]);
//    }
    /**
     * @Route("/api/VerifyCode", format="json", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function TestingGrounds(Request $request, SerializerInterface $serializer, Hash $jsonAuthentification): Response {
        $entityManager = $this->getDoctrine()->getManager();
//        $jsonAuthentification->saveJsonCode(2);
        $erg = "XD";
        $hash = "XYRBUGnigcYC7Nbr0cNKvqIWtoCl7jzSVoIL99tdgyChsTG9f62HPaxznSMeBV4WGHtIoekJ55Rpv54kmWAr6JGR0TJSIxhwkFbn";
        $erg = $jsonAuthentification->checkJsonCode(2, $hash);
//        $erg = $Users = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => 'test'])[0];

        return new Response($serializer->serialize($erg, 'json'), 200);
    }
}
