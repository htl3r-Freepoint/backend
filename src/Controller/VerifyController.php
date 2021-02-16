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
     * @Route("/verify/{id}")
     * @param String $id
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return Response
     */
    public function Verify_User(string $id, Request $request, SerializerInterface $serializer): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $entityManager = $this->getDoctrine()->getManager();
            $code = $data['code'] ?? $id ?? null;
            if (!isset($code)) return new Response("please provide a code", 400);

            $verify = $this->getDoctrine()->getRepository(Verify::class)->findBy(['code' => $code]);
            if (count($verify) != 1) return new Response("CODE NOT FOUND", 404);

            $user = $this->getDoctrine()->getRepository(User::class)->findBy(['id' => $verify[0]->getFKUserID()]);
            if (count($user) != 1) return new Response("USER NOT FOUND", 404);
            $user = $user[0];
            if ($user->getVerified()) return new Response("User is already verified", 400);

            $verify[0]->setVerfiyDate(new \DateTime());
            $entityManager->persist($verify[0]);
            $entityManager->flush();


            $user->setVerified(true);
            $entityManager->persist($user);
            $entityManager->flush();

            return new Response($serializer->serialize($user, 'json'), 200);
        }
        return new Response("Successfuly verified!");
    }
}