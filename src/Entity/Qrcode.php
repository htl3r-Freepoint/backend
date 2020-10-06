<?php

namespace App\Entity;

use App\Repository\QrcodeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QrcodeRepository::class)
 */
class Qrcode {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $FK_User_ID;

    /**
     * @ORM\Column(type="string", length=4056)
     */
    private $Klartext;

    /**
     * @ORM\Column(type="date")
     */
    private $ScannDatum;

    public function getId(): ?int {
        return $this->id;
    }

    public function getFKUserID(): ?int {
        return $this->FK_User_ID;
    }

    public function setFKUserID(int $FK_User_ID): self {
        $this->FK_User_ID = $FK_User_ID;

        return $this;
    }

    public function getKlartext(): ?string {
        return $this->Klartext;
    }

    public function setKlartext(string $Klartext): self {
        $this->Klartext = $Klartext;

        return $this;
    }

    public function getScannDatum(): ?\DateTimeInterface {
        return $this->ScannDatum;
    }

    public function setScannDatum(\DateTimeInterface $ScannDatum): self {
        $this->ScannDatum = $ScannDatum;

        return $this;
    }
}
