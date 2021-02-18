<?php

namespace App\Entity;

use App\Repository\WiderspruchsrechtRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WiderspruchsrechtRepository::class)
 */
class Widerspruchsrecht {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=99999)
     */
    private $data;

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void {
        $this->email = $email;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getData(): ?string {
        return $this->data;
    }

    public function setData(string $data): self {
        $this->data = $data;

        return $this;
    }
}
