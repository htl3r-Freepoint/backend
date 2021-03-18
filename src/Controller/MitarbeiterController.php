<?php

namespace App\Controller;

use App\Entity\Angestellte;
use App\Entity\Firma;
use App\Entity\User;
use App\Service\clean;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class MitarbeiterController extends AbstractController {

    //4 Rechte Stufen:
    /**
     * 0: Kunde
     * 1: Angestellte
     * 2: Verwalter
     * 3: Owner
     */

    /**
     * @Route("/api/addMitarbeiter")
     * @param Request $request
     * @return Response
     */
    public function Add_Mitarbeiter(Request $request, SerializerInterface $serializer, Hash $jsonAuth, clean $clean): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $entityManager = $this->getDoctrine()->getManager();
            if (!$jsonAuth->checkJsonCode($data['token'])) return new Response('Token Invalid', 403);

            $firmenname = $data['firmenname'];
            $rechte = $data['rechteLevel'] ?? 0;
            $addedUser = $data['email'];

            /** @var User $USER */
            $USER = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $addedUser])[0];
            /** @var Firma $FIRMA */
            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname])[0];

            $MITARBEITER = new Angestellte();
            $MITARBEITER->setFKUserID($USER->getId());
            $MITARBEITER->setFKFimraID($FIRMA->getId());
            $MITARBEITER->setRechte($rechte);

            $entityManager->persist($MITARBEITER);
            $entityManager->flush();

            return new Response($serializer->serialize($MITARBEITER, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/removeMitarbeiter")
     * @param Request $request
     * @return Response
     */
    public function Remove_Mitarbeiter(Request $request, SerializerInterface $serializer, Hash $jsonAuth, clean $clean): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $entityManager = $this->getDoctrine()->getManager();
            if (!$jsonAuth->checkJsonCode($data['token'])) return new Response('Token Invalid', 403);

            $firmenname = $data['firmenname'];
            $user = $data['email'];

            $USER = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $user])[0];
            $FIRMA = $jsonAuth->returnFirmenFromHash("token", $firmenname);
            $ANGESTELLTER = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_User_ID' => $USER->getID(), 'FK_Fimra_ID' => $FIRMA->getID()])[0];

            $entityManager->remove($ANGESTELLTER);
            $entityManager->flush();

            return new Response("successful", 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/editMitarbeiter")
     * @param Request $request
     * @return Response
     */
    public function Edit_Mitarbeiter(Request $request, SerializerInterface $serializer, Hash $jsonAuth, clean $clean): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $entityManager = $this->getDoctrine()->getManager();
            if (!$jsonAuth->checkJsonCode($data['token'])) return new Response('Token Invalid', 403);

            $firmenname = $data['firmenname'];
            $rechte = $data['rechteLevel'] ?? 1;
            $addedUser = $data['email'];

            /** @var User $USER */
            $USER = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $addedUser])[0];
            /** @var Firma $FIRMA */
            $FIRMA = $jsonAuth->returnFirmenFromHash("token", $firmenname);
            $ANGESTELLTER = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_User_ID' => $USER->getID(), 'FK_Fimra_ID' => $FIRMA->getID()])[0];

            $ANGESTELLTER->setRechte($rechte);

            $entityManager->persist($ANGESTELLTER);
            $entityManager->flush();

            return new Response($serializer->serialize($ANGESTELLTER, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }
}
