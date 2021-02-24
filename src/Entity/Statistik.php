<?php

namespace App\Entity;

use App\Repository\StatistikRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatistikRepository::class)
 */
class Statistik
{
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFKFirmaID(): ?int
    {
        return $this->FK_Firma_ID;
    }

    public function setFKFirmaID(int $FK_Firma_ID): self
    {
        $this->FK_Firma_ID = $FK_Firma_ID;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
