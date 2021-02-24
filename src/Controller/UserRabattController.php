<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Punkte;
use App\Entity\Rabatt;
use App\Entity\User;
use App\Entity\UserRabatte;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserRabattController extends AbstractController {
    /**
     * @Route("/user/rabatt", name="user_rabatt")
     */
//    public function index() {
//        return $this->render('user_rabatt/index.php.twig', [
//            'controller_name' => 'UserRabattController',
//        ]);
//    }

    /**
     * @Route("/api/getUserrabatte")
     * @param Request $request
     * @return Response
     */
    public function GET_Userrabatte_API(Request $request, SerializerInterface $serializer): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $id = $data['id'];

            if ($id < 0) {
                $data = $this->getDoctrine()->getRepository(UserRabatte::class)->findAll();
                return new Response($serializer->serialize($data, 'json'), 200);
            } else {
                $data = $this->getDoctrine()->getRepository(UserRabatte::class)->findBy(['FK_User_ID' => $id]); //Hier umändern
                return new Response($serializer->serialize($data, 'json'), 200);
            }
        }
    }

    /**
     * @Route("/api/useUserrabatte")
     * @param Request $request
     * @return Response
     */
    public function Use_Userrabatte_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $entityManager = $this->getDoctrine()->getManager();
            $data = json_decode($request->getContent(), true);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Hash Invalid', 403);
            $code = $data["code"];

            $Rabatt = $this->getDoctrine()->getRepository(UserRabatte::class)->findBy(["Rabatt_Code" => $code]);
            if (count($Rabatt) == 0) return new Response("Coupon Code Not Found. Please try again with another code", 400);
            if (count($Rabatt) >= 2) return new Response("Too many codes found. Please contact the administrator", 400);
            $Rabatt = $Rabatt[0];
            if ($Rabatt->getUsed() == true) return new Response("Code has already been used", 400);

            $entityManager->remove($Rabatt);
            $entityManager->flush();

            return new Response('successful', 200);
        }
    }

    /**
     * @Route("/api/addUserrabatte")
     * @param Request $request
     * @return Response
     */
    public function Add_Userrabatte_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $entityManager = $this->getDoctrine()->getManager();
            $data = json_decode($request->getContent(), true);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);
            /** @var User $user */
            $hash = $data['hash'];
            $user = $jsonAuth->returnUserFromHash($hash)['user'];
            $firmenname = $data['firmenName'];
            $rabattID = $data['rabattID'];

            /** @var Firma $FIRMA */
            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname])[0];
            /** @var Punkte $PUNKTE */
            $PUNKTE = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_Firma_ID' => $FIRMA->getId(), "FK_User_ID" => $user->getId()])[0];
            /** @var Rabatt $RABATT */
            $RABATT = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['id' => $rabattID])[0];

            if ($PUNKTE->getPunkte() - $RABATT->getNeededPoints() >= 0) {
                $PUNKTE->setPunkte($PUNKTE->getPunkte() - $RABATT->getNeededPoints());
                $code = $jsonAuth->generateJsonCode();

                $USERRABATT = new UserRabatte();
                $USERRABATT->setFKUserID($user->getId());
                $USERRABATT->setFKRabattID($rabattID);
                $USERRABATT->setRabattCode($code);
                $USERRABATT->setUsed(false);

                $entityManager->persist($PUNKTE);
                $entityManager->persist($USERRABATT);
                $entityManager->flush();

            }

            return new Response($serializer->serialize($code, 'json'), 200);
        }
    }
}
