<?php


namespace App\Service;

use App\Controller\UserController;
use App\Entity\LoginAuthentification;
use Doctrine\ORM\EntityManager;

class Hash extends UserController {
    public function generateCode($id) {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime() * 1000000);
        $i = 0;
        $pass = '';

        while ($i <= 40) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        $idStr = ($id * 37) . "";
        $part1 = substr($pass, 0, 13);
        $part2 = substr($pass, 13, strlen($pass));

        $hash = password_hash($part1 . strrev($idStr) . $part2, PASSWORD_DEFAULT);

        $noSpaces = str_replace(' ', '-', $hash); // Replaces all spaces with hyphens.
        $noSpecialChars = preg_replace('/[^A-Za-z0-9\-]/', '', $noSpaces); // Removes special chars.
        $erg = substr($noSpecialChars, 0, 3);

        if (strlen($erg) >= 1000) $erg = substr($erg, 0, 800);


        return $erg;
    }


    public function checkJsonCode($userID, $hash): bool { // Code wird überprüft
        $entityManager = $this->getDoctrine()->getManager();
        $DataDB = $this->getDoctrine()->getRepository(LoginAuthentification::class)->findAll();
        $valid = 1;
        foreach ($DataDB as $data) {
            $date = date_format($data->getCreationDate(), "y-m-d");
            $date2 = date_format(new \DateTime(), "y-m-d");

            if ((strtotime($date) - strtotime($date2)) / -86400 >= 30) { //86400 = 60*60*24
                if ($data->getHash() == $hash && $data->getFKUserID() == $userID || $data->getValid() == false) $valid = -1;
                $entityManager->remove($data);
                $entityManager->flush();
            }
        }
        return $valid == 1 ? true : false; //true: Code ist valid; false: Code ist invalid
    }

    public function saveJsonCode($userID): string { //Code wird erstellt, gespeichert und zurück gegeben
        $code = $this->generateJsonCode();
        $entityManager = $this->getDoctrine()->getManager();
        $LOGINAUTHENTIFICATION = new LoginAuthentification();
        $LOGINAUTHENTIFICATION->setFKUserID($userID);
        $LOGINAUTHENTIFICATION->setValid(true);
        $LOGINAUTHENTIFICATION->setCreationDate(new \DateTime("yesterday"));
        $LOGINAUTHENTIFICATION->setHash($code);

        $entityManager->persist($LOGINAUTHENTIFICATION);
        $entityManager->flush();
        return $code;
    }


    public function generateJsonCode(): string { //Code wird nur erstellt
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 100; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}