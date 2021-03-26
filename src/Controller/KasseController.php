<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Kasse;
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
     * @Route("/api/addRegister")
     * @param Request $request
     * @return Response
     */
    public function ADD_Kasse_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $entityManager = $this->getDoctrine()->getManager();
            $data = json_decode($request->getContent(), true);
            $hash = $data['hash'];
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Hash Invalid', 403);

            $name = mb_split("_", $data["qrcode"])[2];
            $firmenname = $data['companyName'];

            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("This company does not exist!", 400);
            $FIRMA = $FIRMA[0];

            $rechte = $jsonAuth->returnRechteFromHash($hash, $firmenname);

            $KASSEN = $this->getDoctrine()->getRepository(Kasse::class)->findBy(['Bezeichnung' => $name]);
            if (count($KASSEN) != 0) return new Response("Already used", 400);

            if ($rechte >= 2) {
                $KASSE = new Kasse();
                $KASSE->setBezeichnung($name);
                $KASSE->setFkFirmaId($FIRMA->getId());

                $entityManager->persist($KASSE);
                $entityManager->flush();
            } else {
                return new Response("You do not have enough rights!", 400);
            }

            $Kassen = $this->getDoctrine()->getRepository(Kasse::class)->findBy(['fk_firma_id' => $FIRMA->getID()]);

            return new Response($serializer->serialize($Kassen, 'json'), 200);
        }
    }

    /**
     * @Route("/api/getRegisters")
     * @param Request $request
     * @return Response
     */
    public function GET_Kasse_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $firmenname = $data['companyName'];

            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("Company not found", 400);
            $FIRMA = $FIRMA[0];

            $KASSE = $this->getDoctrine()->getRepository(Kasse::class)->findBy(['fk_firma_id' => $FIRMA->getID()]);

            return new Response($serializer->serialize($KASSE, 'json'), 200);
        }
    }

    /**
     * @Route("/api/deleteRegister")
     * @param Request $request
     * @return Response
     */
    public function DELETE_Kasse_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $entityManager = $this->getDoctrine()->getManager();
            $data = json_decode($request->getContent(), true);
            $hash = $data['hash'];
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Hash Invalid', 403);

            $firmenname = $data['companyName'];
            $id = $data['id'];

            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("Company not found", 400);
            $FIRMA = $FIRMA[0];

            $KASSE = $this->getDoctrine()->getRepository(Kasse::class)->findBy(['id' => $id]);
            if (count($KASSE) == 0) return new Response("Kasse not found", 400);
            $rechte = $jsonAuth->returnRechteFromHash($hash, $firmenname);

            if ($rechte >= 2) {
                $entityManager->remove($KASSE[0]);
                $entityManager->flush();
            }

            return new Response("Successful", 200);
        }
    }

}
