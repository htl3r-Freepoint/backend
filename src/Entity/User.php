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


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $verified;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $loginType;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $locked = false;

    /**
     * @return bool
     */
    public function isLocked(): bool {
        return $this->locked;
    }

    /**
     * @param bool $locked
     */
    public function setLocked(bool $locked): void {
        $this->locked = $locked;
    }

    /**
     * @return mixed
     */
    public function getLoginType() {
        return $this->loginType;
    }

    /**
     * @param mixed $loginType
     */
    public function setLoginType($loginType): void {
        $this->loginType = $loginType;
    }

    /**
     * @return mixed
     */
    public function getVerified() {
        return $this->verified;
    }

    /**
     * @param mixed $verified
     */
    public function setVerified($verified): void {
        $this->verified = $verified;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password): void {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


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
