<?php

namespace App\Controller;

use App\Entity\Angestellte;
use App\Entity\Firma;
use App\Entity\Rabatt;
use App\Entity\User;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RabattController extends AbstractController {
    /**
     * @Route("/rabatt", name="rabatt")
     */
//    public function index() {
//        return $this->render('rabatt/index.php.twig', [
//            'controller_name' => 'RabattController',
//        ]);
//    }

    private function saveRabatt($fk_firma_id, $price, $title, $text, $is_percent, $neededPoints, $kategorie, $percentage) {

        $entityManager = $this->getDoctrine()->getManager();

        $Firma = new Rabatt();
        $Firma->setFKFirmaID($fk_firma_id);
        $Firma->setIsPercent($is_percent);
        $Firma->setNeededPoints($neededPoints);
        $Firma->setPrice($price);
        $Firma->setTitle($title);
        $Firma->setText($text);
        $Firma->setKategorie($kategorie);
        $Firma->setPercentage($percentage);

        $entityManager->persist($Firma);
        $entityManager->flush();

        return true;
    }

    /**
     * @Route("/api/getRabatt")
     * @param Request $request
     * @return Response
     * @var Rabatt $RABATT
     * @var Firma $FIRMA
     */
    public function GET_Rabatt_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response { //TODO: Edit Rechte
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $hash = $data['hash'] ?? null;
            if (isset($hash)) {
                if (!$jsonAuth->checkJsonCode($hash)) return new Response('Token invalid', 403);
                /** @var User $user */
                $user = $jsonAuth->returnUserFromHash($hash)['user'];
            }

            $firmenname = $data['firmenname'];


            if (isset($firmenname)) {
                /** @var Firma $FIRMA */
                $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname])[0];
                $RABATT = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['FK_Firma_ID' => $FIRMA->getID()]);
                $tmperg = array();


                foreach ($RABATT as $rabatt) {
                    array_push($tmperg, [
                        "id" => $rabatt->getId(),
                        "title" => $rabatt->getTitle(),
                        "text" => $rabatt->getText(),
                        "isPercent" => $rabatt->getIsPercent(),
                        "price" => $rabatt->getPrice(),
                        "percentage" => $rabatt->getPercentage(),
                        "value" => $rabatt->getNeededPoints()
                    ]);
                }
                $name = $FIRMA->getFirmanname();
                $erg[$name] = $tmperg;
                if (isset($user)) {
                    $erg['editRights'] = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_User_ID' => $user->getId(), 'FK_Fimra_ID' => $FIRMA->getId()])[0]->getRechte();
                } else {
                    $erg['editRights'] = 0;
                }

                return new Response($serializer->serialize($erg, 'json'), 200);
            } else {
                $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['FK_User_ID__Owner' => $user->getID()]);
                $erg = array();

                foreach ($FIRMA as $firma) {
                    $RABATT = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['FK_Firma_ID' => $firma->getID()]);
                    $tmperg = array();

                    foreach ($RABATT as $rabatt) {
                        array_push($tmperg, [
                            "id" => $rabatt->getId(),
                            "title" => $rabatt->getTitle(),
                            "text" => $rabatt->getText(),
                            "isPercent" => $rabatt->getIsPercent(),
                            "price" => $rabatt->getPrice(),
                            "percentage" => $rabatt->getPercentage(),
                            "value" => $rabatt->getNeededPoints()
                        ]);
                    }
                    $name = $firma->getFirmanname();
                    $erg[$name] = $tmperg;
                }

                return new Response($serializer->serialize($erg, 'json'), 200);
            }
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/saveRabatt")
     * @param Request $request
     * @return Response
     */
    public function POST_Rabatt_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
//            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);
//            $user = $jsonAuth->returnUserFromHash($data['hash'])['user'];

            $firmenname = $data["firmanname"];
            $title = $data["title"];
            $is_percent = $data["is_percent"];
            $neededPoints = $data["value"];
            $price = $data["price"] ?? null;
            $text = $data["text"] ?? null;
            $percentage = $data['percentage'] ?? null;
            $kategorie = $data["kategorie"] ?? null;


            $Firma = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname])[0];
            $fk_firma_id = $Firma->getID();

            $RECHTE = $jsonAuth->returnRechteFromHash($data['token'], $firmenname);
            if ($RECHTE >= 2) {
                if ($this->saveRabatt($fk_firma_id, $price, $title, $text, $is_percent, $neededPoints, $kategorie, $percentage) == true) {
                    return new Response($serializer->serialize($Firma, 'json'), 200);
                }
            } else return new Response("You do not have the rights to do this action. Please ask the owner to give you permission.", 400);
        } else {
            return new Response("", 404);
        }
    }
}