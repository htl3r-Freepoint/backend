<?php

namespace App\Entity;

use App\Repository\AngestellteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AngestellteRepository::class)
 */
class Angestellte {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $FK_User_ID;

    /**
     * @ORM\Column(type="integer")
     */
    private $FK_Fimra_ID;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Rechte;

    public function getId(): ?int {
        return $this->id;
    }

    public function getFKUserID(): ?int {
        return $this->FK_User_ID;
    }

    public function setFKUserID(int $FK_User_ID): self {
        $this->FK_User_ID = $FK_User_ID;

        return $this;
    }

    public function getFKFimraID(): ?int {
        return $this->FK_Fimra_ID;
    }

    public function setFKFimraID(int $FK_Fimra_ID): self {
        $this->FK_Fimra_ID = $FK_Fimra_ID;

        return $this;
    }

    public function getRechte(): ?int {
        return $this->Rechte;
    }

    public function setRechte(?int $Rechte): self {
        $this->Rechte = $Rechte;

        return $this;
    }
}
