<?php

namespace App\Entity;

use App\Repository\BetriebRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BetriebRepository::class)
 */
class Betrieb {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $FK_Firma_ID;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $Addresse;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $PLZ;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Ort;

    public function getId(): ?int {
        return $this->id;
    }

    public function getFKFirmaID(): ?int {
        return $this->FK_Firma_ID;
    }

    public function setFKFirmaID(int $FK_Firma_ID): self {
        $this->FK_Firma_ID = $FK_Firma_ID;

        return $this;
    }

    public function getAddresse(): ?string {
        return $this->Addresse;
    }

    public function setAddresse(?string $Addresse): self {
        $this->Addresse = $Addresse;

        return $this;
    }

    public function getPLZ(): ?string {
        return $this->PLZ;
    }

    public function setPLZ(?string $PLZ): self {
        $this->PLZ = $PLZ;

        return $this;
    }

    public function getOrt(): ?string {
        return $this->Ort;
    }

    public function setOrt(?string $Ort): self {
        $this->Ort = $Ort;

        return $this;
    }
}
