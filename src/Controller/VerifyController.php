<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Verify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class VerifyController extends AbstractController {

    /**
     * @Route("/verify/{id}".{_format}", format="json", requirements={ "_format": "json" })
     * @param Request $request
     * @return Response
     */
//    public function Verify_User(string $id, Request $request): Response {
//        if ($request->getRequestFormat() == 'json') {
//            if ($request->getMethod() == 'GET') {
//
//                $entityManager = $this->getDoctrine()->getManager();
//                $verify = $this->getDoctrine()->getRepository(Verify::class)->findBy(['code' => $id]);
//
//                if (count($verify) != 1) return new Response("404 NOT FOUND", 400);
//                $user = $this->getDoctrine()->getRepository(User::class)->findBy(['id' => $verify->getFKUserID()]);
//                if (count($user) != 0) return new Response("404 NOT FOUND", 400);
//                $user = $user[0];
//                if ($user->getVerified()) return new Response("-1 user already verified", 400);
//
//                $verify = $verify[0];
//
//                $verify->setVerfiyDate(new \DateTime());
//                $entityManager->persist($verify);
//                $entityManager->flush();
//
//
//                $user->setVerified(true);
//
//                $entityManager->persist($user);
//                $entityManager->flush();
//
//                return new Response(1);
//            }
//        }
//    }
    /**
     * Überarbeiten:
     * Punkte controller + doc
     * Rabattcontroller + doc
     * Standortcontroller + doc
     */
}