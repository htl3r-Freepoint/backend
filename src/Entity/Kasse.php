<?php

namespace App\Entity;

use App\Repository\KasseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KasseRepository::class)
 */
class Kasse
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
    private $fk_firma_id;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $Bezeichnung;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFkFirmaId(): ?int
    {
        return $this->fk_firma_id;
    }

    public function setFkFirmaId(int $fk_firma_id): self
    {
        $this->fk_firma_id = $fk_firma_id;

        return $this;
    }

    public function getBezeichnung(): ?string
    {
        return $this->Bezeichnung;
    }

    public function setBezeichnung(string $Bezeichnung): self
    {
        $this->Bezeichnung = $Bezeichnung;

        return $this;
    }
}
