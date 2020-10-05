<?php

namespace App\Entity;

use App\Repository\DesignZuweisungRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DesignZuweisungRepository::class)
 */
class DesignZuweisung {
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
     * @ORM\Column(type="integer")
     */
    private $FK_Design_ID;

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

    public function getFKDesignID(): ?int {
        return $this->FK_Design_ID;
    }

    public function setFKDesignID(int $FK_Design_ID): self {
        $this->FK_Design_ID = $FK_Design_ID;

        return $this;
    }
}
