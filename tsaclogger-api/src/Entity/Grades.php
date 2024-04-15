<?php

namespace App\Entity;

use App\Repository\GradesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GradesRepository::class)]
class Grades
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $route_id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column]
    private ?int $grade = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRouteId(): ?int
    {
        return $this->route_id;
    }

    public function setRouteId(int $route_id): static
    {
        $this->route_id = $route_id;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): static
    {
        $this->grade = $grade;

        return $this;
    }
}
