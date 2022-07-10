<?php

namespace App\Entity;

use App\Repository\ThemesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemesRepository::class)
 */
class Themes
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
    private $idTheme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomTheme;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTheme(): ?int
    {
        return $this->idTheme;
    }

    public function setIdTheme(int $idTheme): self
    {
        $this->idTheme = $idTheme;

        return $this;
    }

    public function getNomTheme(): ?string
    {
        return $this->nomTheme;
    }

    public function setNomTheme(string $nomTheme): self
    {
        $this->nomTheme = $nomTheme;

        return $this;
    }
}
