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
        $erg = "";
        $hash = "ttgIeo6YNCoDg3YoJNUlMy868vhWBblZv6z4Ki61pEV3ATcWiqr4aZPPLiu19MfNHl5wa48tnJM6l2N7iAJumg7mnw6z0kGIhGtS";
//        $erg = $jsonAuthentification->checkJsonCode($hash);
//        $erg = $Users = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => 'test'])[0];
//        $erg = $jsonAuthentification->returnRechteFromHash($hash, "Schnitzelbude1337");
//        $erg = $dsgvo->unlockUser(null, '5124@htl.rennweg.at');
//        $erg = $dsgvo->deleteEverything(null, '32541432');

        return new Response($serializer->serialize($erg, 'json'), 404);
    }

    /**
     * @Route("/api/addRegisters")
     * @param Request $request
     * @return Response
     */
    public function ADD_Kasse_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $entityManager = $this->getDoctrine()->getManager();
            $data = json_decode($request->getContent(), true);
            $hash = $data['hash'];
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Hash Invalid', 403);

            $name = $data["qrcode"];
            $firmenname = $data['companyName'];

            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("This company does not exist!", 400);
            $FIRMA = $FIRMA[0];

            $rechte = $jsonAuth->returnRechteFromHash($hash, $firmenname);

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
                $entityManager->remove($KASSE);
                $entityManager->flush();
            }

            return new Response("Successful", 200);
        }
    }

}
