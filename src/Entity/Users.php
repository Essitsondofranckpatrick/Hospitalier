<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diplome;

    /**
     * @ORM\OneToMany(targetEntity=Interactions::class, mappedBy="users")
     */
    private $interactions;

    /**
     * @ORM\OneToMany(targetEntity=AchievedProjects::class, mappedBy="users")
     */
    private $achievedProjects;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedin;

    public function __construct()
    {
        $this->interactions = new ArrayCollection();
        $this->achievedProjects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(?string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * @return Collection<int, Interactions>
     */
    public function getInteractions(): Collection
    {
        return $this->interactions;
    }

    public function addInteraction(Interactions $interaction): self
    {
        if (!$this->interactions->contains($interaction)) {
            $this->interactions[] = $interaction;
            $interaction->setUsers($this);
        }

        return $this;
    }

    public function removeInteraction(Interactions $interaction): self
    {
        if ($this->interactions->removeElement($interaction)) {
            // set the owning side to null (unless already changed)
            if ($interaction->getUsers() === $this) {
                $interaction->setUsers(null);
            }
        }

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
            $achievedProject->setUsers($this);
        }

        return $this;
    }

    public function removeAchievedProject(
        AchievedProjects $achievedProject
    ): self {
        if ($this->achievedProjects->removeElement($achievedProject)) {
            // set the owning side to null (unless already changed)
            if ($achievedProject->getUsers() === $this) {
                $achievedProject->setUsers(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }

    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(?string $facebook): self
    {
        $this->facebook = $facebook;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }
}
