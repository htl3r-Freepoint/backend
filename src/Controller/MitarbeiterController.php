<?php

namespace App\Controller;

use App\Entity\Angestellte;
use App\Entity\Firma;
use App\Entity\LoginAuthentification;
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
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Token Invalid', 403);

            $firmenname = $data['companyName'];
            $rechte = $data['role'] ?? 0;
            $addedUser = $data['email'];

            $USER = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $addedUser]);
            if (count($USER) == 0) return new Response("The User does not exist", 400);
            /** @var User $USER */
            $USER = $USER[0];

            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("The Company does not exist", 400);
            /** @var Firma $FIRMA */
            $FIRMA = $FIRMA[0];

            $RECHTE = $jsonAuth->returnRechteFromHash($data['hash'], $firmenname);
            if ($RECHTE < $rechte) return new Response("You do not have enough rights to do this action", 400);

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
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Token Invalid', 403);

            $firmenname = $data['companyName'];
            $user = $data['email'];

            $USER = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $user]);
            if (count($USER) == 0) return new Response("User not found", 400);
            $USER = $USER[0];
            $FIRMA = $jsonAuth->returnFirmenFromHash($data['hash'], $firmenname)[0];
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
            $hash = $data['hash'];
            $entityManager = $this->getDoctrine()->getManager();
            if (count($this->getDoctrine()->getRepository(LoginAuthentification::class)->findBy(['Hash' => $hash])) == 0) return new Response("User Token not found", 400);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Token Invalid', 403);

            $firmenname = $data['companyName'];
            $rechte = $data['role'] ?? 1;
            $addedUser = $data['email'];


            $USER = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $addedUser]);
            if (count($USER) == 0) return new Response("User not found", 400);
            /** @var User $USER */
            $USER = $USER[0];
            /** @var Firma $FIRMA */
            $FIRMA = $jsonAuth->returnFirmenFromHash($hash, $firmenname)[0];
            $ANGESTELLTER = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_User_ID' => $USER->getID(), 'FK_Fimra_ID' => $FIRMA->getID()]);
            if (count($ANGESTELLTER) == 0) return new Response("User or Company not found", 400);
            /** @var Angestellte $ANGESTELLTER */
            $ANGESTELLTER = $ANGESTELLTER[0];


            $RECHTE = $jsonAuth->returnRechteFromHash($hash, $firmenname);
            if ($RECHTE < $rechte) return new Response("You do not have enough rights to do this action", 400);

            $firma = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($firma) == 0) return new Response("Company not found", 400);

            $ANGESTELLTER->setRechte($rechte);
            $entityManager->persist($ANGESTELLTER);
            $entityManager->flush();

//            if ($rechte == 3) {
//                $user = $jsonAuth->returnUserFromHash($hash)['user'];
//                $oldOwner = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_User_ID' => $user->getID(), 'FK_Fimra_ID' => $FIRMA->getID()]);
//                if (count($oldOwner) == 0) {
//                    $angestellter = new Angestellte();
//                } else {
//                    $angestellter = $oldOwner[0];
//                }
//
//                $angestellter->setRechte(2);
//                $entityManager->persist($angestellter);
//                $entityManager->flush();
//
//                $firma[0]->setFKUserIDOwner($user->getID());
//                $entityManager->persist($firma[0]);
//                $entityManager->flush();
//            }

            return new Response("", 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/getMitarbeiter")
     * @param Request $request
     * @return Response
     */
    public function GET_Mitarbeiter(Request $request, SerializerInterface $serializer, Hash $jsonAuth, clean $clean): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Token Invalid', 403);

            $firmenname = $data['companyName'];
            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("Please provide a company name", 400);
            $FIRMA = $FIRMA[0];
            $erg = array();

            $RECHTE = $jsonAuth->returnRechteFromHash($data['hash'], $firmenname);
            if ($RECHTE >= 3) {
                $MITARBEITER = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_Fimra_ID' => $FIRMA->getID()]);
                /** @var Angestellte $mitarbeiter */
                foreach ($MITARBEITER as $mitarbeiter) {
                    $ret = [];
                    $USER = $this->getDoctrine()->getRepository(User::class)->findBy(['id' => $mitarbeiter->getFKUserID()]);
                    if (count($USER) != 0) {
                        /** @var User $USER */
                        $USER = $USER[0];
                        $vorname = $USER->getVorname();
                        $nachname = $USER->getNachname();
                        if (isset($vorname) && !isset($nachname)) $ret['name'] = $vorname;
                        if (!isset($vorname) && isset($nachname)) $ret['name'] = $nachname;
                        if (isset($vorname) && isset($nachname)) $ret['name'] = $vorname . " " . $nachname;
                        if (!isset($vorname) && !isset($nachname)) $ret['name'] = null;
                        $ret['role'] = $mitarbeiter->getRechte();
                        $ret['email'] = $USER->getEmail();
                        array_push($erg, $ret);
                    } else {
                        array_push($erg, []);
                    }
                }
            }
            return new Response($serializer->serialize($erg, 'json'), 200);
        }
    }
}
