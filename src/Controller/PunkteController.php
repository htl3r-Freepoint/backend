<?php

namespace App\Controller;

use App\Entity\Firma;
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
//        return $this->render('punkte/index.php.twig', [
//            'controller_name' => 'PunkteController',
//        ]);
//    }

    /**
     * @Route("/api/getPoints")
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param Hash $jsonAuth
     * @return Response
     */
    public function GET_Punkte_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $hash = $data['hash'] ?? null;

            if (!isset($hash)) return new Response("please provide a token", 400);

            if (!$jsonAuth->checkJsonCode($hash)) return new Response('-1 invalid', 403);
            $firmenname = $data['companyName'];
            $user = $jsonAuth->returnUserFromHash($hash)['user'];
            $id = $user->getID();

            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("Please provide a company Name", 400);
            $firmaID = $FIRMA[0]->getID();

            if ($id < 0) {
                $data = $this->getDoctrine()->getRepository(Punkte::class)->findAll();
                return new Response($serializer->serialize($data, 'json'), 200);
            } else {
                if (isset($firmaID)) {
                    $data = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_User_ID' => $id, 'FK_Firma_ID' => $firmaID]); //Hier umändern
                    if (count($data) > 0) {
                        $erg = $data[0]->getPunkte();
                    } else {
                        $erg = 0;
//                        return new Response($serializer->serialize([
//                            'user' => $user, 'firma' => $FIRMA, 'allePunkte' => $this->getDoctrine()->getRepository(Punkte::class)->findAll()
//                        ], 'json'), 417);
                    }

                    return new Response($serializer->serialize($erg, 'json'), 200);
                } else {
                    $data = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_User_ID' => $id]); //Hier umändern
                    return new Response($serializer->serialize($data, 'json'), 200);

                }
            }
        } else {
            return new Response("", 404);
        }
    }

}
