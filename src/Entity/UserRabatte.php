<?php

namespace App\Entity;

use App\Repository\UserRabatteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRabatteRepository::class)
 */
class UserRabatte {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    private $Rabatt_Code;

    /**
     * @ORM\Column(type="integer")
     */
    private $FK_User_ID;

    /**
     * @ORM\Column(type="integer")
     */
    private $FK_Rabatt_ID;

    /**
     * @return mixed
     */
    public function getRabattCode() {
        return $this->Rabatt_Code;
    }

    /**
     * @param mixed $Rabatt_Code
     */
    public function setRabattCode($Rabatt_Code): void {
        $this->Rabatt_Code = $Rabatt_Code;
    }

    /**
     * @return mixed
     */
    public function getFKUserID() {
        return $this->FK_User_ID;
    }

    /**
     * @param mixed $FK_User_ID
     */
    public function setFKUserID($FK_User_ID): void {
        $this->FK_User_ID = $FK_User_ID;
    }

    /**
     * @return mixed
     */
    public function getFKRabattID() {
        return $this->FK_Rabatt_ID;
    }

    /**
     * @param mixed $FK_Rabatt_ID
     */
    public function setFKRabattID($FK_Rabatt_ID): void {
        $this->FK_Rabatt_ID = $FK_Rabatt_ID;
    }


}
