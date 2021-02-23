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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $AppAufrufe = 0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $KaeufeRabatte = 0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $GenutzteRabatte = 0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $GescannteRechnungen = 0;


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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Domain;

    /**
     * @return int
     */
    public function getAppAufrufe(): int {
        return $this->AppAufrufe;
    }

    /**
     * @param int $AppAufrufe
     */
    public function setAppAufrufe(int $AppAufrufe): void {
        $this->AppAufrufe = $AppAufrufe;
    }

    /**
     * @return int
     */
    public function getKaeufeRabatte(): int {
        return $this->KaeufeRabatte;
    }

    /**
     * @param int $KaeufeRabatte
     */
    public function setKaeufeRabatte(int $KaeufeRabatte): void {
        $this->KaeufeRabatte = $KaeufeRabatte;
    }

    /**
     * @return int
     */
    public function getGenutzteRabatte(): int {
        return $this->GenutzteRabatte;
    }

    /**
     * @param int $GenutzteRabatte
     */
    public function setGenutzteRabatte(int $GenutzteRabatte): void {
        $this->GenutzteRabatte = $GenutzteRabatte;
    }

    /**
     * @return int
     */
    public function getGescannteRechnungen(): int {
        return $this->GescannteRechnungen;
    }

    /**
     * @param int $GescannteRechnungen
     */
    public function setGescannteRechnungen(int $GescannteRechnungen): void {
        $this->GescannteRechnungen = $GescannteRechnungen;
    }

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
