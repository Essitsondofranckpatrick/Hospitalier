<?php

namespace App\Entity;

use App\Repository\EquipesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $nombreMembres;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Membres::class, mappedBy="equipe")
     */
    private $membres;

    /**
     * @ORM\OneToMany(targetEntity=RealiserProjet::class, mappedBy="idequipe")
     */
    private $realiserProjets;

    public function __construct()
    {
        $this->membres = new ArrayCollection();
        $this->realiserProjets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Membres>
     */
    public function getMembres(): Collection
    {
        return $this->membres;
    }

    public function addMembre(Membres $membre): self
    {
        if (!$this->membres->contains($membre)) {
            $this->membres[] = $membre;
            $membre->setEquipe($this);
        }

        return $this;
    }

    public function removeMembre(Membres $membre): self
    {
        if ($this->membres->removeElement($membre)) {
            // set the owning side to null (unless already changed)
            if ($membre->getEquipe() === $this) {
                $membre->setEquipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RealiserProjet>
     */
    public function getRealiserProjets(): Collection
    {
        return $this->realiserProjets;
    }

    public function addRealiserProjet(RealiserProjet $realiserProjet): self
    {
        if (!$this->realiserProjets->contains($realiserProjet)) {
            $this->realiserProjets[] = $realiserProjet;
            $realiserProjet->setIdequipe($this);
        }

        return $this;
    }

    public function removeRealiserProjet(RealiserProjet $realiserProjet): self
    {
        if ($this->realiserProjets->removeElement($realiserProjet)) {
            // set the owning side to null (unless already changed)
            if ($realiserProjet->getIdequipe() === $this) {
                $realiserProjet->setIdequipe(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }
}
