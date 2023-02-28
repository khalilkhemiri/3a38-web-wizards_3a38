<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank( message:'le nom du produit ne peut pas etre vide ')]
    #[Assert\Length(
        min:3 ,
        max:20,
        minMessage:'le nom doit faire au moins 4 caracteres',
        maxMessage:'le nom doit faire au plus 20 caracteres'
     )]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank( message:'la description du produit ne peut pas etre vide ')]
    #[Assert\Length(
        min:4 ,
        max:1000,
        minMessage:'la description doit faire au moins 4 caracteres',
        maxMessage:'la description doit faire au plus 20 caracteres'
     )]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank( message:'le prix du produit ne peut pas etre vide ')]
    #[Assert\PositiveOrZero( message:'le prix ne peut pas etre négative ')]
    #[Assert\GreaterThan(
        message:'le prix ne peut pas etre inferieur a 1 ',
        value: 1,
    )]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    #[Assert\NotBlank( message:'le prix du produit ne peut pas etre vide ')]
    #[Assert\PositiveOrZero( message:'le stock ne peut pas etre négative ')]
    private ?int $stock = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

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
