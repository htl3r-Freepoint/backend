<?php

namespace App\Controller;

use App\Entity\Punkte;
use App\Entity\User;
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
     * @Route(
     *     "/api/punkte/{id}.{_format}",
     *     format="html",
     *     name="show_punkte_json",
     *     requirements={
     *         "_format": "html|json|xml",
     *     }
     * )
     */
    public function Punkte_API(User $user, string $_format, SerializerInterface $serializer, Request $request): Response {

        $tournament = $this->getDoctrine()->getRepository(Punkte::class);
        $punkte = $tournament->findBy(['FK_User_ID' => $user->getId()]);


        $request->getAcceptableContentTypes();
        if ($_format == 'json') {
            $jsonContent = $serializer->serialize($punkte, 'json');
            return new Response($jsonContent);
        }
        return new Response('Easily found tournament entry with flying distance ' . $punkte->getPunkte());
    }

}
