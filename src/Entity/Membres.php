<?php

namespace App\Entity;

use App\Repository\MembresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MembresRepository::class)
 */
class Membres
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
    private $idStagiare;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fonction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdStagiare(): ?int
    {
        return $this->idStagiare;
    }

    public function setIdStagiare(int $idStagiare): self
    {
        $this->idStagiare = $idStagiare;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }
}
