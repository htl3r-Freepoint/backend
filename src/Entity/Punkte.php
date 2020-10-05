<?php

namespace App\Entity;

use App\Repository\PunkteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PunkteRepository::class)
 */
class Punkte {
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
     * @ORM\Column(type="integer")
     */
    private $FK_Firma_ID;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Punkte;

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

    public function getFKFirmaID(): ?int {
        return $this->FK_Firma_ID;
    }

    public function setFKFirmaID(int $FK_Firma_ID): self {
        $this->FK_Firma_ID = $FK_Firma_ID;

        return $this;
    }

    public function getPunkte(): ?float {
        return $this->Punkte;
    }

    public function setPunkte(?float $Punkte): self {
        $this->Punkte = $Punkte;

        return $this;
    }
}
