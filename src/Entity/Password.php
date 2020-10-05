<?php

namespace App\Entity;

use App\Repository\PasswordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PasswordRepository::class)
 */
class Password {
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
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    public function getId(): ?int {
        return $this->id;
    }

    public function setID(int $password): self {
        $this->id = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    public function getFKUserID(): ?int {
        return $this->FK_User_ID;
    }

    public function setFKUserID(int $FK_User_ID): self {
        $this->FK_User_ID = $FK_User_ID;

        return $this;
    }

    public function getPassword(): ?string {
        return $this->Password;
    }

    public function setPassword(string $Password): self {
        $this->Password = $Password;

        return $this;
    }
}
