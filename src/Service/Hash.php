<?php


namespace App\Service;

use App\Controller\UserController;
use App\Entity\Angestellte;
use App\Entity\Firma;
use App\Entity\LoginAuthentification;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Hash extends UserController {
    public function generateCode($id) {
//        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
//        srand((double)microtime() * 1000000);
//        $i = 0;
//        $pass = '';
//
//        while ($i <= 40) {
//            $num = rand() % 33;
//            $tmp = substr($chars, $num, 1);
//            $pass = $pass . $tmp;
//            $i++;
//        }
//
//        $idStr = ($id * 37) . "";
//        $part1 = substr($pass, 0, 13);
//        $part2 = substr($pass, 13, strlen($pass));
//
//        $hash = password_hash($part1 . strrev($idStr) . $part2, PASSWORD_DEFAULT);
//
//        $noSpaces = str_replace(' ', '-', $hash); // Replaces all spaces with hyphens.
//        $noSpecialChars = preg_replace('/[^A-Za-z0-9\-]/', '', $noSpaces); // Removes special chars.
//        $erg = substr($noSpecialChars, 0, 3);
//
//        if (strlen($erg) >= 1000) $erg = substr($erg, 0, 800);
//
//
//        return $erg;
        $this->generateJsonCode();
    }


    public function checkJsonCode($hash): bool { // Code wird überprüft
        $entityManager = $this->getDoctrine()->getManager();
        $DataDB = $this->getDoctrine()->getRepository(LoginAuthentification::class)->findAll();
        $valid = 1;
        foreach ($DataDB as $data) {
            $date = date_format($data->getCreationDate(), "y-m-d");
            $date2 = date_format(new \DateTime(), "y-m-d");

            if ((strtotime($date) - strtotime($date2)) / -86400 >= 30) { //86400 = 60*60*24
                if ($data->getHash() == $hash || $data->getValid() == false) $valid = -1;
                $entityManager->remove($data);
                $entityManager->flush();
            }
        }
        return $valid == 1 ? true : false; //true: Code ist valid; false: Code ist invalid
    }

    public function returnUserFromHash($hash) {
        $entityManager = $this->getDoctrine()->getManager();
        $DataDB = $this->getDoctrine()->getRepository(LoginAuthentification::class)->findBy(['Hash' => $hash]);
        echo count($DataDB);
        $valid = true;
        foreach ($DataDB as $data) {
            $date = date_format($data->getCreationDate(), "y-m-d");
            $date2 = date_format(new \DateTime(), "y-m-d");

            if ((strtotime($date) - strtotime($date2)) / -86400 >= 30) { //86400 = 60*60*24
                if ($data->getHash() == $hash || $data->getValid() == false) $valid = false;
            }
        }

        $user = $this->getDoctrine()->getRepository(User::class)->findBy(['id' => $DataDB[0]->getFKUserID()]);

        $data = [
            'valid' => $valid,
            'user' => $user[0]
        ];
        return $data;
    }

    public function returnFirmenFromHash($hash, $firmenname = null) {
        /** @var User $user */
        $user = $this->returnUserFromHash($hash)['user'];
        if (isset($firmenname)) $DataDB = $this->getDoctrine()->getRepository(Firma::class)->findBy(['FK_User_ID__Owner' => $user->getId(), 'Firmanname' => $firmenname]);
        if (!isset($firmenname)) $DataDB = $this->getDoctrine()->getRepository(Firma::class)->findBy(['FK_User_ID__Owner' => $user->getId()]);

        return $DataDB;
    }

    public function saveJsonCode($userID, $code = null): string { //Code wird erstellt, gespeichert und zurück gegeben
        $entityManager = $this->getDoctrine()->getManager();
        $oldHashes = $this->getDoctrine()->getRepository(LoginAuthentification::class)->findBy(['FK_User_ID' => $userID]);
        foreach ($oldHashes as $h) {
            $entityManager->remove($h);
            $entityManager->flush();
        }


        if (!isset($code)) $code = $this->generateJsonCode();
        $LOGINAUTHENTIFICATION = new LoginAuthentification();
        $LOGINAUTHENTIFICATION->setFKUserID($userID);
        $LOGINAUTHENTIFICATION->setValid(true);
        $LOGINAUTHENTIFICATION->setCreationDate(new \DateTime("yesterday"));
        $LOGINAUTHENTIFICATION->setHash($code);

        $entityManager->persist($LOGINAUTHENTIFICATION);
        $entityManager->flush();
        return $code;
    }


    public function generateJsonCode(): string { // Hash soll erstellt werden

        // Alle Zahlen und Buchstaben, aus denen ein code erstellt werden kann.
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

        // in $erg wird der Code schlussendlich geschrieben
        $erg = array();

        // Es wird geschaut, wie lange der String von den zu benutzenden Zeichen ist
        $alphaLength = strlen($alphabet) - 1;

        // Der Ergebnis Hash soll 100 Zeichen lang sein
        for ($i = 0; $i < 100; $i++) {

            // Es wird eine zufällige Zahl ersteltt, die in $alphabet vorkommt
            $n = rand(0, $alphaLength);

            // die Zufällige Zahl wird genommen un in $erg geschrieben
            $erg[] = $alphabet[$n];
        }

        // Array wird in ein String konvertiert und zurückgegeben
        return implode($erg);
    }

    public function returnRechteFromHash($hash, $firmenname) {
        /** @var User $user */
        $user = $this->returnUserFromHash($hash)['user'];
        $FIRMA = $this->getDoctrine()->getRepository(Firma::class)->findBy(['Firmanname' => $firmenname])[0];

        $ANGESTELLTE = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_User_ID' => $user->getID(), 'FK_Fimra_ID' => $FIRMA->getID()])[0];;
        return $ANGESTELLTE->getRechte();
    }
}