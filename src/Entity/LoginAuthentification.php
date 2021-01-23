<?php

namespace App\Entity;

use App\Repository\LoginAuthentificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoginAuthentificationRepository::class)
 */
class LoginAuthentification {
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
     * @ORM\Column(type="string", length=1000)
     */
    private $Hash;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Valid;

    /**
     * @ORM\Column(type="date")
     */
    private $CreationDate;

    /**
     * @return mixed
     */
    public function getCreationDate() {
        return $this->CreationDate;
    }

    /**
     * @param mixed $CreationDate
     */
    public function setCreationDate($CreationDate): void {
        $this->CreationDate = $CreationDate;
    }

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

    public function getHash(): ?string {
        return $this->Hash;
    }

    public function setHash(string $Hash): self {
        $this->Hash = $Hash;

        return $this;
    }

    public function getValid(): ?int {
        return $this->Valid;
    }

    public function setValid(int $Valid): self {
        $this->Valid = $Valid;

        return $this;
    }
}
