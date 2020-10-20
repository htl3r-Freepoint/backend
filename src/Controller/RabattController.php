<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Rabatt;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RabattController extends AbstractController {
    /**
     * @Route("/rabatt", name="rabatt")
     */
    public function index() {
        return $this->render('rabatt/index.html.twig', [
            'controller_name' => 'RabattController',
        ]);
    }

    /**
     * @Route(
     *     "/api/rabatt/{id}.{_format}",
     *     format="html",
     *     name="show_rabatt_json",
     *     requirements={
     *         "_format": "html|json|xml",
     *     }
     * )
     */
    public function Rabatt_API(Firma $firma, string $_format, SerializerInterface $serializer, Request $request): Response {

        $tournament = $this->getDoctrine()->getRepository(Rabatt::class);
        $rabatt = $tournament->findBy(['FK_Firma_ID' => $firma->getId()]);


        $request->getAcceptableContentTypes();
        if ($_format == 'json') {
            $jsonContent = $serializer->serialize($firma, 'json');
            return new Response($jsonContent);
        }
        return new Response('Easily found tournament entry with flying distance ' . $rabatt->getID());
    }
}
