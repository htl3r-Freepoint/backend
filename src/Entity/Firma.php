<?php

namespace App\Entity;

use App\Repository\FirmaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FirmaRepository::class)
 */
class Firma {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $FK_User_ID__Owner;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Firmanname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Kontakt_Email;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $XEuroFuer1Punkt;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $Datei;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Domain;

    public function getId(): ?int {
        return $this->id;
    }

    public function getFKUserIDOwner(): ?int {
        return $this->FK_User_ID__Owner;
    }

    public function setFKUserIDOwner(?int $FK_User_ID__Owner): self {
        $this->FK_User_ID__Owner = $FK_User_ID__Owner;

        return $this;
    }

    public function getFirmanname(): ?string {
        return $this->Firmanname;
    }

    public function setFirmanname(string $Firmanname): self {
        $this->Firmanname = $Firmanname;

        return $this;
    }

    public function getKontaktEmail(): ?string {
        return $this->Kontakt_Email;
    }

    public function setKontaktEmail(?string $Kontakt_Email): self {
        $this->Kontakt_Email = $Kontakt_Email;

        return $this;
    }

    public function getXEuroFuer1Punkt(): ?float {
        return $this->XEuroFuer1Punkt;
    }

    public function setXEuroFuer1Punkt(?float $XEuroFuer1Punkt): self {
        $this->XEuroFuer1Punkt = $XEuroFuer1Punkt;

        return $this;
    }

    public function getDatei() {
        return $this->Datei;
    }

    public function setDatei($Datei): self {
        $this->Datei = $Datei;

        return $this;
    }

    public function getDomain(): ?string {
        return $this->Domain;
    }

    public function setDomain(string $Domain): self {
        $this->Domain = $Domain;

        return $this;
    }
}
