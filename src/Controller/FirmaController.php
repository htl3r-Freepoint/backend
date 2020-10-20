<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Punkte;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FirmaController extends AbstractController {
    /**
     * @Route("/firma", name="firma")
     */
    public function index() {
        return $this->render('firma/index.html.twig', [
            'controller_name' => 'FirmaController',
        ]);
    }

    /**
     * @Route(
     *     "/api/firma/{id}.{_format}",
     *     format="html",
     *     name="show_firma_json",
     *     requirements={
     *         "_format": "html|json|xml",
     *     }
     * )
     */
    public function Firma_API(Firma $firma, string $_format, SerializerInterface $serializer, Request $request): Response {

//        $tournament = $this->getDoctrine()->getRepository(Punkte::class);
//        $punkte = $tournament->findBy(['FK_User_ID' => $user->getId()]);


        $request->getAcceptableContentTypes();
        if ($_format == 'json') {
            $jsonContent = $serializer->serialize($firma, 'json');
            return new Response($jsonContent);
        }
        return new Response('Easily found tournament entry with flying distance ' . $firma->getFirmanname());
    }
}
