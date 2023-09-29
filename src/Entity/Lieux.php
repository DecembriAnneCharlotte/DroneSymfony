<?php

namespace App\Entity;

use App\Repository\LieuxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuxRepository::class)]
class Lieux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?flotte $latitude_depart = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?flotte $logitude_depart = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?flotte $latitude_arrivee = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?flotte $longitude_arrivee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitudeDepart(): ?flotte
    {
        return $this->latitude_depart;
    }

    public function setLatitudeDepart(?flotte $latitude_depart): static
    {
        $this->latitude_depart = $latitude_depart;

        return $this;
    }

    public function getLogitudeDepart(): ?flotte
    {
        return $this->logitude_depart;
    }

    public function setLogitudeDepart(?flotte $logitude_depart): static
    {
        $this->logitude_depart = $logitude_depart;

        return $this;
    }

    public function getLatitudeArrivee(): ?flotte
    {
        return $this->latitude_arrivee;
    }

    public function setLatitudeArrivee(?flotte $latitude_arrivee): static
    {
        $this->latitude_arrivee = $latitude_arrivee;

        return $this;
    }

    public function getLongitudeArrivee(): ?flotte
    {
        return $this->longitude_arrivee;
    }

    public function setLongitudeArrivee(?flotte $longitude_arrivee): static
    {
        $this->longitude_arrivee = $longitude_arrivee;

        return $this;
    }
}
