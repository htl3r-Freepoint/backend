<?php

namespace App\Entity;

use App\Repository\DesignRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DesignRepository::class)
 */
class Design {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $Datei;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Typ;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $StingDatei;

    /**
     * @return mixed
     */
    public function getStingDatei() {
        return $this->StingDatei;
    }

    /**
     * @param mixed $StingDatei
     */
    public function setStingDatei($StingDatei): void {
        $this->StingDatei = $StingDatei;
    }

    /**
     * @return mixed
     */
    public function getTyp() {
        return $this->Typ;
    }

    /**
     * @param mixed $Typ
     */
    public function setTyp($Typ): void {
        $this->Typ = $Typ;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->Name;
    }

    public function setName(string $Name): self {
        $this->Name = $Name;

        return $this;
    }

    public function getDatei() {
        $datei = $this->Datei;
        return null;
        if (isset($datei)) return stream_get_contents($datei); else return null;

    }

    public function setDatei($Datei): self {
        $this->Datei = $Datei;

        return $this;
    }
}
