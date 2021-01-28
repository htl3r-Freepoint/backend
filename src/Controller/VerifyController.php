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
     * @Route("/verify")
     * @param Request $request
     * @return Response
     */
    public function Verify_User(Request $request, SerializerInterface $serializer): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $entityManager = $this->getDoctrine()->getManager();
            $code = $data['code'] ?? null;
            if (!isset($code)) return new Response("-1 code", 400);

            $verify = $this->getDoctrine()->getRepository(Verify::class)->findBy(['code' => $code]);
            if (count($verify) != 1) return new Response("404 CODE NOT FOUND", 400);

            $user = $this->getDoctrine()->getRepository(User::class)->findBy(['id' => $verify[0]->getFKUserID()]);
            if (count($user) != 1) return new Response("404 USER NOT FOUND", 400);
            if ($user[0]->getVerified()) return new Response("-1 Already Verfied", 400);

            $verify[0]->setVerfiyDate(new \DateTime());
            $entityManager->persist($verify[0]);
            $entityManager->flush();


            $user[0]->setVerified(true);
            $entityManager->persist($user[0]);
            $entityManager->flush();

            return new Response($serializer->serialize($user[0], 'json'), 200);
        }
    }
}