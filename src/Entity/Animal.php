<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    /**
     * @Assert\NotBlank(message="champs obligatoire")
     * * @Assert\GreaterThanOrEqual(1)
     */
    private ?string $nom = null;

    #[ORM\Column]
    /**
     * @Assert\NotBlank(message="champs obligatoire")
     * * @Assert\GreaterThanOrEqual(1,message="Age doit etre superieur ou egale a 1")
     */
    private ?int $age = null;

    #[ORM\Column]
    /**
     * @Assert\NotBlank(message="champs obligatoire")
     * * @Assert\GreaterThan(0.5,message="Poids doit etre superieur ou egale a 0.5")
     */
    private ?float $poids = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    private ?Categorie $categories = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getCategories(): ?Categorie
    {
        return $this->categories;
    }

    public function setCategories(?Categorie $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}
