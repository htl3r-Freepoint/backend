<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vorname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nachname;

    public function getId(): ?int {
        return $this->id;
    }

    public function getUsername(): ?string {
        return $this->Username;
    }

    public function setUsername(string $Username): self {
        $this->Username = $Username;

        return $this;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;

        return $this;
    }

    public function getVorname(): ?string {
        return $this->vorname;
    }

    public function setVorname(?string $vorname): self {
        $this->vorname = $vorname;

        return $this;
    }

    public function getNachname(): ?string {
        return $this->nachname;
    }

    public function setNachname(?string $nachname): self {
        $this->nachname = $nachname;

        return $this;
    }
}
