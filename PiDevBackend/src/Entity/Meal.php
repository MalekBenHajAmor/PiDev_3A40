<?php

namespace App\Entity;

use App\Repository\MealRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MealRepository::class)]
class Meal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomRepas = null;

    #[ORM\Column(length: 255)]
    private ?string $ingrediants = null;

    #[ORM\Column(type: 'text')] 
    private ?string $recette = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(choices: ['Breakfast', 'Lunch', 'Dinner'])]
    private ?string $typeRepas = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRepas(): ?string
    {
        return $this->nomRepas;
    }

    public function setNomRepas(string $nomRepas): static
    {
        $this->nomRepas = $nomRepas;

        return $this;
    }

    public function getIngrediants(): ?string
    {
        return $this->ingrediants;
    }

    public function setIngrediants(string $ingrediants): static
    {
        $this->ingrediants = $ingrediants;

        return $this;
    }

    public function getRecette(): ?string
    {
        return $this->recette;
    }

    public function setRecette(string $recette): static
    {
        $this->recette = $recette;

        return $this;
    }

    public function getTypeRepas(): ?string
    {
        return $this->typeRepas;
    }

    public function setTypeRepas(string $typeRepas): static
    {
        $this->typeRepas = $typeRepas;

        return $this;
    }
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
  
}
