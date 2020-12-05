<?php

namespace App\Entity;

use App\Repository\VerifyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VerifyRepository::class)
 */
class Verify {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $RegisterDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $VerfiyDate;

    /**
     * @ORM\Column(type="string", length=1048)
     */
    private $code;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FK_User_ID;


    public function getFKUserID() {
        return $this->FK_User_ID;
    }

    public function setFKUserID($FK_User_ID): void {
        $this->FK_User_ID = $FK_User_ID;
    }

    public function getRegisterDate() {
        return $this->RegisterDate;
    }

    public function setRegisterDate($RegisterDate): void {
        $this->RegisterDate = $RegisterDate;
    }

    public function getVerfiyDate() {
        return $this->VerfiyDate;
    }

    public function setVerfiyDate($VerfiyDate): void {
        $this->VerfiyDate = $VerfiyDate;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(string $code): self {
        $this->code = $code;

        return $this;
    }
}
