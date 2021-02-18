<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\DSGVO;
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
//        return $this->render('kasse/index.php.twig', [
//            'controller_name' => 'KasseController',
//        ]);
//    }
    /**
     * @Route("/api/VerifyCode", format="json", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function TestingGrounds(Request $request, SerializerInterface $serializer, Hash $jsonAuthentification, DSGVO $dsgvo): Response {
        $entityManager = $this->getDoctrine()->getManager();
//        $jsonAuthentification->saveJsonCode(2);
//        $erg = "XD";
        $hash = "ttgIeo6YNCoDg3YoJNUlMy868vhWBblZv6z4Ki61pEV3ATcWiqr4aZPPLiu19MfNHl5wa48tnJM6l2N7iAJumg7mnw6z0kGIhGtS";
//        $erg = $jsonAuthentification->checkJsonCode($hash);
//        $erg = $Users = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => 'test'])[0];
//        $erg = $jsonAuthentification->returnRechteFromHash($hash, "Schnitzelbude1337");
        $erg = $dsgvo->getAllUserData($hash, null);

        return new Response($serializer->serialize($erg, 'json'), 200);
    }
}
