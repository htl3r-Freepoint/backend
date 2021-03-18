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
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $percentage;

    /**
     * @ORM\Column(type="string", length=4096)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=4096, nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPercent;

    /**
     * @ORM\Column(type="float")
     */
    private $neededPoints;

    /**
     * @ORM\Column(type="string", length=4096, nullable=true)
     */
    private $kategorie;

    /**
     * @ORM\Column(type="string", length=4096, nullable=true)
     */
    private $pos;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $lastModified;

    /**
     * @return mixed
     */
    public function getLastModified() {
        return $this->lastModified;
    }

    /**
     * @param mixed $lastModified
     */
    public function setLastModified($lastModified): void {
        $this->lastModified = $lastModified;
    }

    /**
     * @return mixed
     */
    public function getPos() {
        return $this->pos;
    }

    /**
     * @param mixed $pos
     */
    public function setPos($pos): void {
        $this->pos = $pos;
    }

    /**
     * @return mixed
     */
    public function getPercentage() {
        return $this->percentage;
    }

    /**
     * @param mixed $percentage
     */
    public function setPercentage($percentage): void {
        $this->percentage = $percentage;
    }

    /**
     * @return mixed
     */
    public function getIsPercent() {
        return $this->isPercent;
    }

    /**
     * @param mixed $isPercent
     */
    public function setIsPercent($isPercent): void {
        $this->isPercent = $isPercent;
    }

    /**
     * @return mixed
     */
    public function getNeededPoints() {
        return $this->neededPoints;
    }

    /**
     * @param mixed $neededPoints
     */
    public function setNeededPoints($neededPoints): void {
        $this->neededPoints = $neededPoints;
    }

    /**
     * @return mixed
     */
    public function getKategorie() {
        return $this->kategorie;
    }

    /**
     * @param mixed $kategorie
     */
    public function setKategorie($kategorie): void {
        $this->kategorie = $kategorie;
    }

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

    public function getPrice(): ?float {
        return $this->price;
    }

    public function setPrice(float $X_Punkte_Fuer_1_Rabatt): self {
        $this->price = $X_Punkte_Fuer_1_Rabatt;

        return $this;
    }

    public function getText(): ?string {
        return $this->text;
    }

    public function setText(?string $Beschreibung): self {
        $this->text = $Beschreibung;

        return $this;
    }

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(?string $Rabattbeschreibung): self {
        $this->title = $Rabattbeschreibung;

        return $this;
    }
}
