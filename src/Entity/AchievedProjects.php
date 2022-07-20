<?php

namespace App\Entity;

use App\Repository\AchievedProjectsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AchievedProjectsRepository::class)
 */
class AchievedProjects
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Projects::class, inversedBy="achievedProjects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projects;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="achievedProjects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjects(): ?Projects
    {
        return $this->projects;
    }

    public function setProjects(?Projects $projects): self
    {
        $this->projects = $projects;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
