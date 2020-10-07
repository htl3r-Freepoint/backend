<?php

namespace App\Controller;

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


class QrcodeController extends AbstractController {
    /**
     * @Route("/qrcode", name="qrcode")
     */
    public function index() {
        return $this->render('qrcode/index.html.twig', [
            'controller_name' => 'QrcodeController',
        ]);
    }

    /**
     * @Route("/qrcode/showAll/", name="showAll_qrcodes")
     */
    public function showAll() {
        $dbCode = $this->getDoctrine()
            ->getRepository(Qrcode::class)
            ->findAll();

        foreach ($this->getDoctrine()->getRepository(Qrcode::class)->findAll() as $code) {
            echo $code->getKlartext() . "<br>";
        }
        return new Response("");
    }

    /**
     * @Route("/qrcode/add/OLD", name="add_qrcodeOLD")
     */
    public function addOLD(string $tmp) {
//        $OGCode = "_R1-AT1_Pos10583_R1032884_2020-08-22T20:49:13_0,00_0,00_0,00_0,00_54,10_iQYTMYI=_5f94be9e_4BsueLTnlNg=+AL1VpN/o4yBf71/5HSlqxj1fYRh1+iOUYtqYk50tlywCfJmiCaFCZ5qR+H4iiEw7r4XMvPRMGL1XW3qAsgnGA==";
//        $OGCode = "_R1-AT1_ZELJKOMUS01A_76999_2020-06-24T17:01:24_0,00_22,80_0,00_0,00_0,00_mKVkoSbGGro=_ae5ac21_CbVLVE8kKU0=_lycmS1Yv2p8PE9PyOvtv+fCOM83XRsexVoTOU0XJu584ZRpV+Dpp4lRJfj2alpbFMTBKKNx799GCH4p1RdR7zg==";
//        $OGCode = "_R1-AT1_MILLESTEL01_21065_2020-06-17T21:10:38_4,50_9,20_0,00_0,00_0,00_AV8kV7FDZsc=_70e7051c_a+XjIhgbCv0=_SMeQwvdKmoBB458sDeySbLDk5mGw1sTuuorKKiqSRxVDjOq4WZeDSgh/nfr9IS6QYJjhWCcbHNyj7t6npu6COA==";
//        $OGCode = "_R1-AT1_MILLESTEL01_20384_2020-06-11T22:05:52_4,50_9,20_0,00_0,00_0,00_5EkLwLBIae0=_70e7051c_O7YxmbB/tag=_WBygY4HMaCW+N4IMuNaIGDjtgk4sMB0fsyOMpaNURJyjgYT+jifas7Y00lilHAdowSz4smCgmmoNIQJ8twK54Q==";
        $OGCode = "_R1-AT1_2_44215_2020-06-26T19:40:59_0,00_11,80_0,00_0,00_0,00_iprQ7utfPYwYwY5Ae2isyg==_53428832_Bt9tEbyPMdU=_vhKE5xQPyt9ItY3A52DNr7as7mZm1UNoB0hYgM1QF+1f5JU43DLA4Nxc7QCu5+7adTNLY6j0pgnKvC7dUHrsnA==";
//        $OGCode = "_R1-AT1_ZELJKOMUS01A_76723_2020-06-21T22:16:54_0,00_12,90_0,00_0,00_0,00_SUkmhAbuE94=_ae5ac21_3qR9QcBE4Dk=_muFrby+N/TUw+Iq56Fa29wwumqvYU1k7pKV39axeSoB3kxJvbhgt2xM0+4nxkmndaLyOF6TAhCU0rSwJspCBmQ==";
        $qrcodes = mb_split("_", $OGCode);

//        foreach ($qrcodes as $code) {
//            echo $code;
//            echo "<br>";
//        }
//        echo "<br>";

        $dbCode = $this->getDoctrine()
            ->getRepository(Qrcode::class)
            ->findAll();

        $allCodes = [];
        foreach ($dbCode as $code) {
            array_push($allCodes, $code->getKlartext());
        }

        $exists = "false";
        foreach ($allCodes as $code) {

            $parts = mb_split("_", $code);
            $length = count($parts);
            $length2 = count($qrcodes);

            if ($code == $OGCode) {
//                echo "Das geliche! <br>";
//                echo $code . "<br>";
//                echo $OGCode . "<br><br>";
                $exists = "true";
            }
            if ($parts[$length - 1] == $qrcodes[$length2 - 1]) {
                $exists = "true";
                echo $qrcodes[$length2 - 1];
                echo "<br>";
                echo $parts[$length - 1];
                echo "<br><br>";
            }
        }
        if ($exists == "true") {
            echo "Fehler! QR-Code wurde schon eingelöst!";
        } else {
            echo $code;
            echo "<br>";
            $entityManager = $this->getDoctrine()->getManager();

            $QRCODE = new Qrcode();
            $QRCODE->setKlartext($OGCode);
            $QRCODE->setFKUserID(1);
            $QRCODE->setScannDatum(new \DateTime());

            $entityManager->persist($QRCODE);

            $entityManager->flush();

            echo "Der QR-Code wurde gspeichert!";

        }

        return new Response("");
    }

    /**
     * @Route("/qrcode/new", name="new_qrcode_form")
     */
    public function add(Request $request) {
        $QRCODE = new Qrcode();
        $form = $this->createForm(QRCodeType::class, $QRCODE)
            ->add('FK_User_ID', NumberType::class, ['label' => 'User ID: '])
            ->add('Klartext', TextType::class, ['label' => 'Klartext: '])
            ->add('ScannDatum', DateType::class, ['label' => 'Scanndatum: '])
            ->add('save', SubmitType::class, ['label' => 'Create QRCode']);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            ////////////////////////////////////////////

            //        $OGCode = "_R1-AT1_Pos10583_R1032884_2020-08-22T20:49:13_0,00_0,00_0,00_0,00_54,10_iQYTMYI=_5f94be9e_4BsueLTnlNg=+AL1VpN/o4yBf71/5HSlqxj1fYRh1+iOUYtqYk50tlywCfJmiCaFCZ5qR+H4iiEw7r4XMvPRMGL1XW3qAsgnGA==";
//        $OGCode = "_R1-AT1_ZELJKOMUS01A_76999_2020-06-24T17:01:24_0,00_22,80_0,00_0,00_0,00_mKVkoSbGGro=_ae5ac21_CbVLVE8kKU0=_lycmS1Yv2p8PE9PyOvtv+fCOM83XRsexVoTOU0XJu584ZRpV+Dpp4lRJfj2alpbFMTBKKNx799GCH4p1RdR7zg==";
//        $OGCode = "_R1-AT1_MILLESTEL01_21065_2020-06-17T21:10:38_4,50_9,20_0,00_0,00_0,00_AV8kV7FDZsc=_70e7051c_a+XjIhgbCv0=_SMeQwvdKmoBB458sDeySbLDk5mGw1sTuuorKKiqSRxVDjOq4WZeDSgh/nfr9IS6QYJjhWCcbHNyj7t6npu6COA==";
//        $OGCode = "_R1-AT1_MILLESTEL01_20384_2020-06-11T22:05:52_4,50_9,20_0,00_0,00_0,00_5EkLwLBIae0=_70e7051c_O7YxmbB/tag=_WBygY4HMaCW+N4IMuNaIGDjtgk4sMB0fsyOMpaNURJyjgYT+jifas7Y00lilHAdowSz4smCgmmoNIQJ8twK54Q==";
//        $OGCode = "_R1-AT1_2_44215_2020-06-26T19:40:59_0,00_11,80_0,00_0,00_0,00_iprQ7utfPYwYwY5Ae2isyg==_53428832_Bt9tEbyPMdU=_vhKE5xQPyt9ItY3A52DNr7as7mZm1UNoB0hYgM1QF+1f5JU43DLA4Nxc7QCu5+7adTNLY6j0pgnKvC7dUHrsnA==";
//        $OGCode = "_R1-AT1_ZELJKOMUS01A_76723_2020-06-21T22:16:54_0,00_12,90_0,00_0,00_0,00_SUkmhAbuE94=_ae5ac21_3qR9QcBE4Dk=_muFrby+N/TUw+Iq56Fa29wwumqvYU1k7pKV39axeSoB3kxJvbhgt2xM0+4nxkmndaLyOF6TAhCU0rSwJspCBmQ==";
            $OGCode = $task->getKlartext();
            $qrcodes = mb_split("_", $OGCode);

            $dbCode = $this->getDoctrine()
                ->getRepository(Qrcode::class)
                ->findAll();

            $allCodes = [];
            foreach ($dbCode as $code) {
                array_push($allCodes, $code->getKlartext());
            }

            $exists = "false";
            foreach ($allCodes as $code) {

                $parts = mb_split("_", $code);
                $length = count($parts);
                $length2 = count($qrcodes);

                if ($code == $OGCode) {
                    $exists = "true";
                }
                if ($parts[$length - 1] == $qrcodes[$length2 - 1]) {
                    $exists = "true";
                }
            }
            if ($exists == "true") {
//                echo "Fehler! QR-Code wurde schon eingelöst!";
                return $this->render("qrcode/failed.html.twig", ["code" => $OGCode]);
            } else {
                $entityManager = $this->getDoctrine()->getManager();

                $QRCODE = new Qrcode();
                $QRCODE->setKlartext($OGCode);
                $QRCODE->setFKUserID(1);
                $QRCODE->setScannDatum(new \DateTime());

                $entityManager->persist($QRCODE);

                $entityManager->flush();

                ////////////////////////////////////////////
                $codeFINISH = $this->getDoctrine()->getRepository(Qrcode::class);
                return $this->render("qrcode/success.html.twig", ["menus" => $codeFINISH->findAll()]);
            }
        }

        return $this->render('qrcode/newForm.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
