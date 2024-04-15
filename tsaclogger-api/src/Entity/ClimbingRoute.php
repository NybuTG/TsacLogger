<?php

namespace App\Entity;

use App\Repository\ClimbingRouteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClimbingRouteRepository::class)]
class ClimbingRoute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $setter = null;

    #[ORM\Column(length: 7)]
    private ?string $color = null;

    #[ORM\Column]
    private array $position = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSetter(): ?string
    {
        return $this->setter;
    }

    public function setSetter(?string $setter): static
    {
        $this->setter = $setter;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getPosition(): array
    {
        return $this->position;
    }

    public function setPosition(array $position): static
    {
        $this->position = $position;

        return $this;
    }
}
