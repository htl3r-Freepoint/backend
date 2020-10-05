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
     * @ORM\Column(type="blob")
     */
    private $Datei;

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
        return $this->Datei;
    }

    public function setDatei($Datei): self {
        $this->Datei = $Datei;

        return $this;
    }
}
