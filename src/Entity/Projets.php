<?php

namespace App\Entity;

use App\Repository\ProjetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetsRepository::class)
 */
class Projets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $idTheme;

    /**
     * @ORM\ManyToOne(targetEntity=Themes::class, inversedBy="projets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theme;

    /**
     * @ORM\OneToOne(targetEntity=OffreStages::class, mappedBy="projet", cascade={"persist", "remove"})
     */
    private $offreStages;

    /**
     * @ORM\OneToMany(targetEntity=RealiserProjet::class, mappedBy="projet")
     */
    private $realiserProjet;

    public function __construct()
    {
        $this->realiserProjet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
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

    public function getTheme(): ?Themes
    {
        return $this->theme;
    }

    public function setTheme(?Themes $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getOffreStages(): ?OffreStages
    {
        return $this->offreStages;
    }

    public function setOffreStages(OffreStages $offreStages): self
    {
        // set the owning side of the relation if necessary
        if ($offreStages->getProjet() !== $this) {
            $offreStages->setProjet($this);
        }

        $this->offreStages = $offreStages;

        return $this;
    }

    /**
     * @return Collection<int, RealiserProjet>
     */
    public function getRealiserProjet(): Collection
    {
        return $this->realiserProjet;
    }

    public function addRealiserProjet(RealiserProjet $realiserProjet): self
    {
        if (!$this->realiserProjet->contains($realiserProjet)) {
            $this->realiserProjet[] = $realiserProjet;
            $realiserProjet->setProjet($this);
        }

        return $this;
    }

    public function removeRealiserProjet(RealiserProjet $realiserProjet): self
    {
        if ($this->realiserProjet->removeElement($realiserProjet)) {
            // set the owning side to null (unless already changed)
            if ($realiserProjet->getProjet() === $this) {
                $realiserProjet->setProjet(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getRef();
    }
}
