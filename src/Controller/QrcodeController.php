<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Kasse;
use App\Entity\Punkte;
use App\Entity\Statistik;
use App\Entity\User;
use App\Service\Hash;
use DateTime;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Qrcode;
use App\Form\QRCodeType;
use Symfony\Component\Serializer\SerializerInterface;


class QrcodeController extends AbstractController {

    protected function saveCode($OGCode, $FKUserId) {
        $entityManager = $this->getDoctrine()->getManager();
        $kasse = mb_split("_", $OGCode)[2];
        $firmen = $this->getDoctrine()->getRepository(Kasse::class)->findBy(['Bezeichnung' => $kasse]);
        if (count($firmen) == 0) return "No company was identified with this 'Kassa'";

        $QRCODE = new Qrcode();
        $QRCODE->setKlartext($OGCode);
        $QRCODE->setFKUserID($FKUserId);
        $QRCODE->setScannDatum(new \DateTime());
        $entityManager->persist($QRCODE);
        $entityManager->flush();


        $firma_id = $firmen[0]->getFkFirmaId();
        $return = ['points' => 0, 'all_points' => 0];
        $punkte = $this->getPointsFromCode($OGCode, $firma_id);
        $tmp = $punkte;
        $PunkteBeiFirma = $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_User_ID' => $FKUserId, 'FK_Firma_ID' => $firma_id]);
        foreach ($PunkteBeiFirma as $pkt) {
            $punkte += $pkt->getPunkte();
            $entityManager->remove($pkt);
        }

        $PUNKTE = new Punkte();
        $PUNKTE->setFKFirmaID($firma_id);
        $PUNKTE->setFKUserID($FKUserId);
        $PUNKTE->setPunkte($punkte);
        $entityManager->persist($PUNKTE);
        $entityManager->flush();
        $punkte = ['points' => $tmp, 'all_points' => $PUNKTE->getPunkte()];

        $STATISTIK = new Statistik();
        $STATISTIK->setDate(new DateTime("0 days ago"));
        $STATISTIK->setType("scanned");
        $STATISTIK->setFKFirmaID($firma_id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($STATISTIK);
        $entityManager->flush();


        return $punkte;
    }

    protected function getPointsFromCode($OGCode, $firmaID): int {
        $euro = floatval(mb_split("_", $OGCode)[5])
            + floatval(mb_split("_", $OGCode)[6])
            + floatval(mb_split("_", $OGCode)[7])
            + floatval(mb_split("_", $OGCode)[8])
            + floatval(mb_split("_", $OGCode)[9]);
        $firma = $this->getDoctrine()->getRepository(Firma::class)->findBy(['id' => $firmaID]);
        $XEuro = $firma[0]->getXEuroFuer1Punkt();
        $result = $euro / $XEuro;


        return intval(round($result));
    }

    protected function checkCode($OGCode) {
        //        $OGCode = "_R1-AT1_Pos10583_R1032884_2020-08-22T20:49:13_0,00_0,00_0,00_0,00_54,10_iQYTMYI=_5f94be9e_4BsueLTnlNg=+AL1VpN/o4yBf71/5HSlqxj1fYRh1+iOUYtqYk50tlywCfJmiCaFCZ5qR+H4iiEw7r4XMvPRMGL1XW3qAsgnGA==";
//        $OGCode = "_R1-AT1_ZELJKOMUS01A_76999_2020-06-24T17:01:24_0,00_22,80_0,00_0,00_0,00_mKVkoSbGGro=_ae5ac21_CbVLVE8kKU0=_lycmS1Yv2p8PE9PyOvtv+fCOM83XRsexVoTOU0XJu584ZRpV+Dpp4lRJfj2alpbFMTBKKNx799GCH4p1RdR7zg==";
//        $OGCode = "_R1-AT1_MILLESTEL01_21065_2020-06-17T21:10:38_4,50_9,20_0,00_0,00_0,00_AV8kV7FDZsc=_70e7051c_a+XjIhgbCv0=_SMeQwvdKmoBB458sDeySbLDk5mGw1sTuuorKKiqSRxVDjOq4WZeDSgh/nfr9IS6QYJjhWCcbHNyj7t6npu6COA==";
//        $OGCode = "_R1-AT1_MILLESTEL01_20384_2020-06-11T22:05:52_4,50_9,20_0,00_0,00_0,00_5EkLwLBIae0=_70e7051c_O7YxmbB/tag=_WBygY4HMaCW+N4IMuNaIGDjtgk4sMB0fsyOMpaNURJyjgYT+jifas7Y00lilHAdowSz4smCgmmoNIQJ8twK54Q==";
//        $OGCode = "_R1-AT1_2_44215_2020-06-26T19:40:59_0,00_11,80_0,00_0,00_0,00_iprQ7utfPYwYwY5Ae2isyg==_53428832_Bt9tEbyPMdU=_vhKE5xQPyt9ItY3A52DNr7as7mZm1UNoB0hYgM1QF+1f5JU43DLA4Nxc7QCu5+7adTNLY6j0pgnKvC7dUHrsnA==";
//        $OGCode = "_R1-AT1_ZELJKOMUS01A_76723_2020-06-21T22:16:54_0,00_12,90_0,00_0,00_0,00_SUkmhAbuE94=_ae5ac21_3qR9QcBE4Dk=_muFrby+N/TUw+Iq56Fa29wwumqvYU1k7pKV39axeSoB3kxJvbhgt2xM0+4nxkmndaLyOF6TAhCU0rSwJspCBmQ==";
        $qrcodes = mb_split("_", $OGCode);

        $dbCode = $this->getDoctrine()->getRepository(Qrcode::class)->findAll();

        $allCodes = [];
        foreach ($dbCode as $code) {
            array_push($allCodes, $code->getKlartext());
        }

        $exists = 0;
        foreach ($allCodes as $code) {

            $parts = mb_split("_", $code);
            $length = count($parts);
            $length2 = count($qrcodes);

            if ($code == $OGCode) {
                return "vorhanden";
            }
            if ($parts[$length - 1] == $qrcodes[$length2 - 1]) {
                return "vorhanden";
            }
            if ($OGCode == "ADD_CODE_HERE") {
                return "vorhanden";
            }
            if (count($this->getDoctrine()->getRepository(Qrcode::class)->findBy(['Klartext' => $OGCode])) != 0) {
                return "vorhanden";
            }
        }
        return 0;
    }

    /**
     * @Route("/api/addQrCode")
     * @param Request $request
     * @return Response
     */
    public function Add_QrCode_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $hash = $data['hash'];
            if (!$jsonAuth->checkJsonCode($hash)) return new Response('-1 invalid', 403);
            /** @var User $user */
            $user = $jsonAuth->returnUserFromHash($hash)['user'];
            $OGCode = $data["code"];
            $UserID = $user->getId();

            $exists = 0;
            $exists = $this->checkCode($OGCode);

            if ($exists != 0 && $exists == "vorhanden") {
                return new Response("QR-Code wurde bereits eingescanned", 400);
            } else {
                $savedPoints = $this->saveCode($OGCode, $UserID);
                if ($savedPoints == "-1 Kassa") return new Response("Kassa not found", 400);
                return new Response($serializer->serialize($savedPoints, 'json'), 200);
            }
        } else {
            return new Response("", 404);
        }
    }
}
