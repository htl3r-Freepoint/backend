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
use Symfony\Component\Validator\Constraints\DateTime;

class RabattController extends AbstractController {
    /**
     * @Route("/rabatt", name="rabatt")
     */
//    public function index() {
//        return $this->render('rabatt/index.php.twig', [
//            'controller_name' => 'RabattController',
//        ]);
//    }

    private function saveRabatt($fk_firma_id, $price, $title, $text, $is_percent, $neededPoints, $kategorie, $percentage, $pos) {

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
        $Firma->setPos($pos);
        $Firma->setLastModified(new \DateTime());

//        $entityManager->persist($Firma);
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
//                return new Response($hash);
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
                        "value" => $rabatt->getNeededPoints(),
                        "pos" => $rabatt->getPos()
                    ]);
                }
                $erg = null;
                $erg['coupons'] = $tmperg;
                if (isset($user)) {
                    $tmp1 = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_User_ID' => $user->getId(), 'FK_Fimra_ID' => $FIRMA->getId()]);
                    if (count($tmp1) > 0) {
                        $erg['editRights'] = $tmp1[0]->getRechte();
                    } else {
                        $erg['editRights'] = 0;
                    }
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

                    /** @var Rabatt $rabatt */
                    foreach ($RABATT as $rabatt) {
                        array_push($tmperg, [
                            "id" => $rabatt->getId(),
                            "title" => $rabatt->getTitle(),
                            "text" => $rabatt->getText(),
                            "isPercent" => $rabatt->getIsPercent(),
                            "price" => $rabatt->getPrice(),
                            "percentage" => $rabatt->getPercentage(),
                            "value" => $rabatt->getNeededPoints(),
                            "pos" => $rabatt->getPos(),
                            "lastChanged" => $rabatt->getLastModified()
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
    public function SAVE_Rabatt_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $rawData = json_decode($request->getContent(), true)['data'];
            $firmenname = $rawData['firmenname'];
            $RECHTE = $jsonAuth->returnRechteFromHash($rawData['hash'], $firmenname);

            if (count($this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname])) != 1) return new Response("You have to provide a company Name");


            $parsedData = json_decode($rawData, true);
            foreach ($parsedData as $data) {
                $title = $data["title"];
                $is_percent = $data["is_percent"];
                $neededPoints = $data["value"];
                $price = $data["price"] ?? null;
                $text = $data["text"] ?? null;
                $percentage = $data['percentage'] ?? null;
                $kategorie = $data["kategorie"] ?? null;
                $pos = $data["pos"];


                $Firma = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname])[0];
                $fk_firma_id = $Firma->getID();

                $RECHTE = $jsonAuth->returnRechteFromHash($data['hash'], $firmenname);
                if ($RECHTE >= 0) {
                    if ($this->saveRabatt($fk_firma_id, $price, $title, $text, $is_percent, $neededPoints, $kategorie, $percentage, $pos) == true) {
                        return new Response($serializer->serialize($Firma, 'json'), 200);
                    }
                } else return new Response("You do not have the rights to do this action. Please ask the owner to give you permission.", 400);
            }
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/changeRabatt")
     * @param Request $request
     * @return Response
     */
    public function Change_Rabatt_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $entityManager = $this->getDoctrine()->getManager();

            $rawData = json_decode($request->getContent(), true)['data'];
            $firmenname = $rawData['firmenname'];
            $RECHTE = $jsonAuth->returnRechteFromHash($rawData['hash'], $firmenname);

            if (count($this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname])) != 1) return new Response("You have to provide a company Name");


            $parsedData = json_decode($rawData, true);
            foreach ($parsedData as $data) {

                $id = $data['id'];
                /** @var Rabatt $RABATT */
                $RABATT = $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['id' => $id])[0];
                $fkFirmaID = $RABATT->getFKFirmaID();
                $title = $data["title"] ?? null;
                $is_percent = $data["is_percent"] ?? null;
                $neededPoints = $data["value"] ?? null;
                $price = $data["price"] ?? null;
                $text = $data["text"] ?? null;
                $percentage = $data['percentage'] ?? null;
                $kategorie = $data["kategorie"] ?? null;
                $pos = $data['pos'] ?? null;

                /** @var Rabatt $RABATT */
                $Firma = $this->getDoctrine()->getRepository(Firma::class)->findBy(['id' => $RABATT->getFKFirmaID()])[0];
                $fk_firma_id = $Firma->getID();


                if ($RECHTE >= 0) {

//                    $entityManager->remove($RABATT);
//                    $entityManager->flush();

                    if (isset($title)) $RABATT->setFKFirmaID($fkFirmaID);
                    if (isset($title)) $RABATT->setTitle($title);
                    if (isset($is_percent)) $RABATT->setIsPercent($is_percent);
                    if (isset($neededPoints)) $RABATT->setNeededPoints($neededPoints);
                    if (isset($price)) $RABATT->setPrice($price);
                    if (isset($text)) $RABATT->setText($text);
                    if (isset($percentage)) $RABATT->setPercentage($percentage);
                    if (isset($kategorie)) $RABATT->setKategorie($kategorie);
                    if (isset($pos)) $RABATT->setPos($pos);
                    $RABATT->setLastModified(new \DateTime());
                    $RABATT->setID($id);

                    $entityManager->persist($RABATT);
                    $entityManager->flush();


                    return new Response($serializer->serialize($Firma, 'json'), 200);
                } else return new Response("You do not have the rights to do this action. Please ask the owner to give you permission.", 400);
            }
        } else {
            return new Response("", 404);
        }
    }


}