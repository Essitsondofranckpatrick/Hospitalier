<?php

namespace App\Entity;

use App\Repository\ProjectsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectsRepository::class)
 */
class Projects
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dureeEstimee;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $offreStage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $effectif;

    /**
     * @ORM\ManyToOne(targetEntity=Themes::class, inversedBy="projects")
     */
    private $themes;

    /**
     * @ORM\OneToMany(targetEntity=AchievedProjects::class, mappedBy="projects")
     */
    private $achievedProjects;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $achieved;

    public function __construct()
    {
        $this->achievedProjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDureeEstimee(): ?int
    {
        return $this->dureeEstimee;
    }

    public function setDureeEstimee(?int $dureeEstimee): self
    {
        $this->dureeEstimee = $dureeEstimee;

        return $this;
    }

    public function getOffreStage(): ?bool
    {
        return $this->offreStage;
    }

    public function setOffreStage(?bool $offreStage): self
    {
        $this->offreStage = $offreStage;

        return $this;
    }

    public function getEffectif(): ?int
    {
        return $this->effectif;
    }

    public function setEffectif(?int $effectif): self
    {
        $this->effectif = $effectif;

        return $this;
    }

    public function getThemes(): ?Themes
    {
        return $this->themes;
    }

    public function setThemes(?Themes $themes): self
    {
        $this->themes = $themes;

        return $this;
    }

    /**
     * @return Collection<int, AchievedProjects>
     */
    public function getAchievedProjects(): Collection
    {
        return $this->achievedProjects;
    }

    public function addAchievedProject(AchievedProjects $achievedProject): self
    {
        if (!$this->achievedProjects->contains($achievedProject)) {
            $this->achievedProjects[] = $achievedProject;
            $achievedProject->setProjects($this);
        }

        return $this;
    }

    public function removeAchievedProject(
        AchievedProjects $achievedProject
    ): self {
        if ($this->achievedProjects->removeElement($achievedProject)) {
            // set the owning side to null (unless already changed)
            if ($achievedProject->getProjects() === $this) {
                $achievedProject->setProjects(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getNom();
    }

    public function getAchieved(): ?bool
    {
        return $this->achieved;
    }

    public function setAchieved(?bool $achieved): self
    {
        $this->achieved = $achieved;

        return $this;
    }
}
