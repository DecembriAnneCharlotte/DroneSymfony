<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: flotte::class)]
    private Collection $date;

    #[ORM\ManyToMany(targetEntity: flotte::class)]
    private Collection $heure;

    public function __construct()
    {
        $this->date = new ArrayCollection();
        $this->heure = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, flotte>
     */
    public function getDate(): Collection
    {
        return $this->date;
    }

    public function addDate(flotte $date): static
    {
        if (!$this->date->contains($date)) {
            $this->date->add($date);
        }

        return $this;
    }

    public function removeDate(flotte $date): static
    {
        $this->date->removeElement($date);

        return $this;
    }

    /**
     * @return Collection<int, flotte>
     */
    public function getHeure(): Collection
    {
        return $this->heure;
    }

    public function addHeure(flotte $heure): static
    {
        if (!$this->heure->contains($heure)) {
            $this->heure->add($heure);
        }

        return $this;
    }

    public function removeHeure(flotte $heure): static
    {
        $this->heure->removeElement($heure);

        return $this;
    }
}
