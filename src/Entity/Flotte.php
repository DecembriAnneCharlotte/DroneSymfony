<?php

namespace App\Entity;

use App\Repository\FlotteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FlotteRepository::class)]
class Flotte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $identitée = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentitée(): ?string
    {
        return $this->identitée;
    }

    public function setIdentitée(string $identitée): static
    {
        $this->identitée = $identitée;

        return $this;
    }

}
