<?php

namespace App\Entity;

use App\Repository\EquipesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipesRepository::class)
 */
class Equipes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idEquipe;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreMembres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEquipe(): ?int
    {
        return $this->idEquipe;
    }

    public function setIdEquipe(int $idEquipe): self
    {
        $this->idEquipe = $idEquipe;

        return $this;
    }

    public function getNombreMembres(): ?int
    {
        return $this->nombreMembres;
    }

    public function setNombreMembres(int $nombreMembres): self
    {
        $this->nombreMembres = $nombreMembres;

        return $this;
    }
}
