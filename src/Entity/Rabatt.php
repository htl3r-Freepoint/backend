<?php

namespace App\Entity;

use App\Repository\RabattRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RabattRepository::class)
 */
class Rabatt {
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
     * @ORM\Column(type="float")
     */
    private $X_Punkte_Fuer_1_Rabatt;

    /**
     * @ORM\Column(type="string", length=4096, nullable=true)
     */
    private $Beschreibung;

    /**
     * @ORM\Column(type="string", length=4096, nullable=true)
     */
    private $Rabattbeschreibung;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $Datei;

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

    public function getXPunkteFuer1Rabatt(): ?float {
        return $this->X_Punkte_Fuer_1_Rabatt;
    }

    public function setXPunkteFuer1Rabatt(float $X_Punkte_Fuer_1_Rabatt): self {
        $this->X_Punkte_Fuer_1_Rabatt = $X_Punkte_Fuer_1_Rabatt;

        return $this;
    }

    public function getBeschreibung(): ?string {
        return $this->Beschreibung;
    }

    public function setBeschreibung(?string $Beschreibung): self {
        $this->Beschreibung = $Beschreibung;

        return $this;
    }

    public function getRabattbeschreibung(): ?string {
        return $this->Rabattbeschreibung;
    }

    public function setRabattbeschreibung(?string $Rabattbeschreibung): self {
        $this->Rabattbeschreibung = $Rabattbeschreibung;

        return $this;
    }

    public function getDatei() {
        return $this->Datei;
    }

    public function setDatei($Datei): self {
        $this->Datei = $Datei;

        return $this;
    }
}
