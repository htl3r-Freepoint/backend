<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController {
    /**
     * @Route("/user", name="user")
     */
    public function index() {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/user/show}", name="show_user")
     */
    public function showUser(): Response {
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $tounamentEntry = new TournamentEntry2();
//        $tounamentEntry->setTraveldistance($traveldistance);
//
//        $entityManager->persist($tounamentEntry);
//
//        $entityManager->flush();

        return new Response('Funktioniert (:');
    }

}
