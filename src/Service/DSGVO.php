<?php


namespace App\Service;


use App\Controller\UserController;
use App\Entity\Angestellte;
use App\Entity\Betrieb;
use App\Entity\Design;
use App\Entity\DesignZuweisung;
use App\Entity\Firma;
use App\Entity\Kasse;
use App\Entity\LoginAuthentification;
use App\Entity\Punkte;
use App\Entity\Qrcode;
use App\Entity\Rabatt;
use App\Entity\User;
use App\Entity\UserRabatte;
use App\Entity\Verify;
use App\Entity\Widerspruchsrecht;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class DSGVO extends UserController {

    public function getAllUserData($hash = null, $email = null) {
        /** @var User $user */
        $user = $this->returnUser($hash, $email);
        $firmen = $this->getFirmen($user);

        $standorte = $this->getStandorte($firmen);
        $designzuweiungen = $this->getDesignZuweisung($firmen);
        $designs = $this->getDesigns($designzuweiungen);
        $angestellte = $this->getAngestellte($firmen);
        $kassen = $this->getKassen($firmen);
        $loginAuth = $this->getLoginAuth($user);
        $qrcodes = $this->getQRCodes($user);
        $rabatte = $this->getRabatte($firmen);
        $userrabatte = $this->getUserRabatte($user);
        $verify = $this->getVerify($user);

        $pw = $user->getPassword();
        $user->setPassword("");

        $data = [
            'user' => $user,
            'firmen' => $firmen,
            'standorte:' => $standorte,
            'designs' => $designs,
            'angestellte' => $angestellte,
            'kassen' => $kassen,
//            'Authentifizierung' => $loginAuth,
            'qrcodes' => $qrcodes,
            'rabatte' => $rabatte,
            'userrabatte' => $userrabatte,
            'verify' => $verify
        ];

        $user->setPassword($pw);

        return $data;
    }

    public function lockUser($hash = null, $email = null) {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var User $user */
        $user = $this->returnUser($hash, $email);
        $user->setLocked(true);
        $entityManager->persist($user);
        $entityManager->flush();

        return $user;
    }

    public function unlockUser($hash = null, $email = null) {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var User $user */
        $user = $this->returnUser($hash, $email);
        $user->setLocked(false);
        $entityManager->persist($user);
        $entityManager->flush();

        return $user;
    }

//    public function lockUser(SerializerInterface $serializer, $hash = null, $email = null) {
//        $entityManager = $this->getDoctrine()->getManager();
//        $data = $this->getAllUserData($hash, $email);
//        $mail = $data['user']->getEmail();
//
//        $WIERECHT = new Widerspruchsrecht();
//        $WIERECHT->setData($serializer->serialize($data, 'json'));
//        $WIERECHT->setEmail($mail . "");
//
////        $this->deleteEverything($hash, $email);
//
//        $entityManager->persist($WIERECHT);
//        $entityManager->flush();
//        return "1";
//    }
//
//    public function unlockUser(SerializerInterface $serializer, $email) {
//        $db = $this->getDoctrine()->getRepository(Widerspruchsrecht::class)->findBy(['email' => $email])[0];
//        $data = json_decode($db->getData(), true);
//        $user = $data['user'];
//        $firmen = $data['firmen'];
//        return $user;
//    }

    public function deleteEverything($hash = null, $email = null) {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->returnUser($hash, $email);
        $firmen = $this->getFirmen($user);

        $standorte = $this->getStandorte($firmen);
        $designzuweiungen = $this->getDesignZuweisung($firmen);
        $designs = $this->getDesigns($designzuweiungen);
        $angestellte = $this->getAngestellte($firmen);
        $kassen = $this->getKassen($firmen);
        $loginAuth = $this->getLoginAuth($user);
        $qrcodes = $this->getQRCodes($user);
        $rabatte = $this->getRabatte($firmen);
        $userrabatte = $this->getUserRabatte($user);
        $verify = $this->getVerify($user);


        $this->deleteQRCode($qrcodes);
        $entityManager->remove($user);
        foreach ($firmen as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }
        foreach ($standorte as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }
        foreach ($designzuweiungen as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }
        foreach ($kassen as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }
        foreach ($angestellte as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }
        foreach ($loginAuth as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }
        foreach ($rabatte as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }
        foreach ($userrabatte as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }
        foreach ($verify as $firma) {
            if (isset($firma)) {
                $entityManager->remove($firma);
            }
        }

        $entityManager->flush();

        return 1;
    }

    private function deleteQRCode($qrcodes) {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Qrcode $code */
        foreach ($qrcodes as $code) {
            if (isset($code)) {
                $code->setFKUserID(0);
                $code->setScannDatum(new \DateTime('2000-01-01'));
                $entityManager->persist($code);
                $entityManager->flush();
            }
        }

    }

    private function getVerify($user) {
        return $this->getDoctrine()->getRepository(Verify::class)->findBy(['FK_User_ID' => $user->getID()]);
    }


    private function getUserRabatte($user) {
        return $this->getDoctrine()->getRepository(UserRabatte::class)->findBy(['FK_User_ID' => $user->getID()]);
    }


    private function getRabatte($firmen) {
        $erg = array();
        foreach ($firmen as $firma) {
            array_push($erg, $this->getDoctrine()->getRepository(Rabatt::class)->findBy(['FK_Firma_ID' => $firma->getId()]));
        }
        return $erg;
    }


    private function getQRCodes($user) {
        return $this->getDoctrine()->getRepository(Qrcode::class)->findBy(['FK_User_ID' => $user->getID()]);
    }

    private function getPunkte($user) {
        return $this->getDoctrine()->getRepository(Punkte::class)->findBy(['FK_User_ID' => $user->getID()]);
    }


    private function getLoginAuth($user) {
        return $this->getDoctrine()->getRepository(LoginAuthentification::class)->findBy(['FK_User_ID' => $user->getID()]);
    }


    private function getKassen($firmen) {
        $erg = array();
        foreach ($firmen as $firma) {
            array_push($erg, $this->getDoctrine()->getRepository(Kasse::class)->findBy(['fk_firma_id' => $firma->getId()]));
        }
        return $erg;
    }


    private function getAngestellte($firmen) {
        $erg = array();
        foreach ($firmen as $firma) {
            array_push($erg, $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_Fimra_ID' => $firma->getId()]));
        }
        return $erg;
    }


    private function getDesigns($designzuweisungen) {
        $erg = array();
        if (isset($designzuweisungen)) {
            if (isset($designzuweisungen[0])) {
                if (isset($designzuweisungen[0][0])) {
                    /** @var DesignZuweisung $desingzuw */
                    foreach ($designzuweisungen as $desingzuw) {
                        if (isset($desingzuw[0])) {
                            array_push($erg, $this->getDoctrine()->getRepository(Design::class)->findBy(['id' => $desingzuw[0]->getFKDesignID()]));
                        } else {
                            array_push($erg, []);
                        }
                    }
                }
            }
        }
        return $erg;
    }

    private function getDesignZuweisung($firmen) {
        $erg = array();
        foreach ($firmen as $firma) {
            array_push($erg, $this->getDoctrine()->getRepository(DesignZuweisung::class)->findBy(['FK_Firma_ID' => $firma->getId()]));
        }
        return $erg;
    }

    private function getStandorte($firmen) {
        $standorte = array();
        /** @var Firma $firma */
        foreach ($firmen as $firma) {
            array_push($standorte,
                $this->getDoctrine()->getRepository(Betrieb::class)->findBy(['FK_Firma_ID' => $firma->getId()])
            );
        }
        return $standorte;
    }

    private function getFirmen($user) {
        $FIRMEN = $this->getDoctrine()->getRepository(Firma::class)->findBy(['FK_User_ID__Owner' => $user->getId()]);

        return $FIRMEN;
    }

    private function returnUser($hash, $email) {
        if (isset($hash)) {
            $DataDB = $this->getDoctrine()->getRepository(LoginAuthentification::class)->findBy(['Hash' => $hash]);
            $user = $this->getDoctrine()->getRepository(User::class)->findBy(['id' => $DataDB[0]->getFKUserID()]);
        } elseif (isset($email)) {
            $user = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email]);
        } else {
            return "no User";
        }
        return $user[0];
    }

}