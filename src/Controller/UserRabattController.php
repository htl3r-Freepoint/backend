<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Punkte;
use App\Entity\Rabatt;
use App\Entity\Statistik;
use App\Entity\User;
use App\Entity\UserRabatte;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use DateTime;

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
     * @Route("/api/getUserCoupons")
     * @param Request $request
     * @return Response
     */
    public function GET_Userrabatte_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $hash = $data['hash'] ?? null;
            if (!isset($hash)) return new Response("You have to provide a user token!", 400);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('User Token not valid', 403);

            $user = $jsonAuth->returnUserFromHash($data['hash'])['user'];
            $id = $user->getID();
            $firmenname = $data['companyName'];

            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("You have to provide a valid company name", 400);
            $FIRMA = $FIRMA[0];
            $RABATT = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['FK_Firma_ID' => $FIRMA->getID()]);

            $erg = array();
            /** @var Rabatt $item */
            foreach ($RABATT as $item) {
                $USERRABATTE = $this->getDoctrine()->getRepository(UserRabatte::class)->findBy(['FK_User_ID' => $id, 'FK_Rabatt_ID' => $item->getId()]); //Hier umändern

                /** @var UserRabatte $userrabatt */
                foreach ($USERRABATTE as $userrabatt) {
                    $dataa = [
                        'id' => $item->getId(),
                        'isPercent' => $item->getIsPercent(),
                        'neededPoints' => $item->getNeededPoints(),
                        'price' => $item->getPrice(),
                        'percentage' => $item->getPercentage(),
                        'title' => $item->getTitle(),
                        'text' => $item->getText(),
                        'kategorie' => $item->getKategorie(),
                        'pos' => $item->getPos(),
                        'code' => $userrabatt->getRabattCode()
                    ];
                    array_push($erg, $dataa);
                }
            }

            return new Response($serializer->serialize($erg, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/useCoupon")
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
            /** @var UserRabatte $Rabatt */
            $Rabatt = $Rabatt[0];

            /** @var Rabatt $Rabatte */
            $Rabatte = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(["id" => $Rabatt->getFKRabattID()]);

            $item = $Rabatte;
            $dataa = [
                'id' => $item->getId(),
                'isPercent' => $item->getIsPercent(),
                'neededPoints' => $item->getNeededPoints(),
                'price' => $item->getPrice(),
                'percentage' => $item->getPercentage(),
                'title' => $item->getTitle(),
                'text' => $item->getText(),
                'kategorie' => $item->getKategorie(),
                'pos' => $item->getPos(),
                'code' => $code
            ];

            /** @var Firma $FIRMA */
            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['id' => $Rabatte->getFKFirmaID()])[0];

            $RECHTE = $jsonAuth->returnRechteFromHash($data['hash'], $FIRMA->getFirmanname());
            if ($RECHTE >= 1) {
                if ($Rabatt->getUsed() == true) return new Response("Code has already been used", 400);

                $entityManager->remove($Rabatt);
                $entityManager->flush();

                $STATISTIK = new Statistik();
                $STATISTIK->setDate(new DateTime("0 days ago"));
                $STATISTIK->setType("gekauft");
                $STATISTIK->setFKFirmaID($FIRMA->getId());
                $entityManager->persist($STATISTIK);
                $entityManager->flush();


                return new Response($dataa, 200);
            }
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/buyCoupon")
     * @param Request $request
     * @return Response
     */
    public function Add_Userrabatte_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $entityManager = $this->getDoctrine()->getManager();
            $data = json_decode($request->getContent(), true);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);

            $hash = $data['hash'];
            $user = $jsonAuth->returnUserFromHash($hash)['user'];
            $firmenname = $data['firmenname'];
            $rabattID = $data['rabattID'];

            $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname]);
            if (count($FIRMA) == 0) return new Response("no company with th name " . $firmenname . " not found", 400);
            $FIRMA = $FIRMA[0];

            $PUNKTE = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_Firma_ID' => $FIRMA->getId(), "FK_User_ID" => $user->getId()]);
            if (count($PUNKTE) == 0) return new Response("insufficient Points", 400);
            $PUNKTE = $PUNKTE[0];

            $RABATT = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['id' => $rabattID]);
            if (count($RABATT) == 0) return new Response("Coupon not found", 400);
            $RABATT = $RABATT [0];

            if ($PUNKTE->getPunkte() - $RABATT->getNeededPoints() >= 0) {
                $PUNKTE->setPunkte($PUNKTE->getPunkte() - $RABATT->getNeededPoints());
                $code = $jsonAuth->generateJsonCode(10);

                $USERRABATT = new UserRabatte();
                $USERRABATT->setFKUserID($user->getId());
                $USERRABATT->setFKRabattID($rabattID);
                $USERRABATT->setRabattCode($code);
                $USERRABATT->setUsed(false);

                $entityManager->persist($PUNKTE);
                $entityManager->persist($USERRABATT);
                $entityManager->flush();

                $STATISTIK = new Statistik();
                $STATISTIK->setDate(new DateTime("0 days ago"));
                $STATISTIK->setType("gekauft");
                $STATISTIK->setFKFirmaID($FIRMA->getId());

            } else {
                return new Response("insufficient Points", 400);
            }

            $PUNKTE = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_Firma_ID' => $FIRMA->getId(), "FK_User_ID" => $user->getId()])[0];
            $item = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['id' => $rabattID])[0];
            $dataa = [
                'id' => $item->getId(),
                'isPercent' => $item->getIsPercent(),
                'neededPoints' => $item->getNeededPoints(),
                'price' => $item->getPrice(),
                'percentage' => $item->getPercentage(),
                'title' => $item->getTitle(),
                'text' => $item->getText(),
                'kategorie' => $item->getKategorie(),
                'pos' => $item->getPos(),
                'code' => $code
            ];

            $erg['points'] = $PUNKTE->getPunkte();
            $erg['coupon'] = $dataa;

            return new Response($serializer->serialize($erg, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }
}
