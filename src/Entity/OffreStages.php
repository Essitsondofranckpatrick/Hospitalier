<?php

namespace App\Entity;

use App\Repository\OffreStagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreStagesRepository::class)
 */
class OffreStages
{
    /**
     * @ORM\Id
     * @ORM\OneToOne(targetEntity=Projets::class, inversedBy="offreStages", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombrePlaces;

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getNombrePlaces(): ?int
    {
        return $this->nombrePlaces;
    }

    public function setNombrePlaces(int $nombrePlaces): self
    {
        $this->nombrePlaces = $nombrePlaces;

        return $this;
    }

    public function getProjet(): ?Projets
    {
        return $this->projet;
    }

    public function setProjet(Projets $projet): self
    {
        $this->projet = $projet;

        return $this;
    }
}
