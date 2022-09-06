<?php

namespace App\Entity;

use App\Repository\UziRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UziRepository::class)]
class Uzi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $neved = null;

    #[ORM\Column(length: 255)]
    private ?string $emailcimed = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $uzeneted = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNeved(): ?string
    {
        return $this->neved;
    }

    public function setNeved(string $neved): self
    {
        $this->neved = $neved;

        return $this;
    }

    public function getEmailcimed(): ?string
    {
        return $this->emailcimed;
    }

    public function setEmailcimed(string $emailcimed): self
    {
        $this->emailcimed = $emailcimed;

        return $this;
    }

    public function getUzeneted(): ?string
    {
        return $this->uzeneted;
    }

    public function setUzeneted(?string $uzeneted): self
    {
        $this->uzeneted = $uzeneted;

        return $this;
    }


}
