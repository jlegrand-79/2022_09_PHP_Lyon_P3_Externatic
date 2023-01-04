<?php

namespace App\Entity;

use Assert\Regex;
use Assert\Length;
use App\Entity\User;
use Assert\NotBlank;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CandidateRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CandidateRepository::class)]
class Candidate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le genre ne peut pas être vide.')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le genre saisi \"{{ value }}\" est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le prénom ne peut pas être vide.')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le prénom saisi \"{{ value }}\" est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom ne peut pas être vide.')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le nom saisi \"{{ value }}\" est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le numéro de téléphone ne peut pas être vide.')]
    #[Assert\Regex(
        pattern: '/\d{10,15}/',
        match: true,
        message: 'Le téléphone saisi \"{{ value }}\" est incorrect, 
        il devrait contenir 10 à 15 chiffres',
    )]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le chemin de l\'image est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $picture = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le chemin du document est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $curriculumVitae = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'L\'adresse ne peut pas être vide.')]
    #[Assert\Length(
        max: 38,
        maxMessage: 'L\'adresse saisie est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 38,
        maxMessage: 'L\'adresse saisie est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $addressComplement = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(
        pattern: '/\d{5}/',
        match: true,
        message: 'Le code postal saisi \"{{ value }}\" est incorrect, 
        il devrait contenir 5 chiffres',
    )]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        max: 38,
        maxMessage: 'La ville saisie est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $city = null;

    #[ORM\OneToOne(inversedBy: 'information', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(User::class)]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Stack::class, inversedBy: 'candidates')]
    #[Assert\Type(Collection::class)]
    private Collection $stacks;

    public function __construct()
    {
        $this->stacks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCurriculumVitae(): ?string
    {
        return $this->curriculumVitae;
    }

    public function setCurriculumVitae(?string $curriculumVitae): self
    {
        $this->curriculumVitae = $curriculumVitae;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getAddressComplement(): ?string
    {
        return $this->addressComplement;
    }

    public function setAddressComplement(?string $addressComplement): self
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Stack>
     */
    public function getStacks(): Collection
    {
        return $this->stacks;
    }

    public function addStack(Stack $stack): self
    {
        if (!$this->stacks->contains($stack)) {
            $this->stacks->add($stack);
        }

        return $this;
    }

    public function removeStack(Stack $stack): self
    {
        $this->stacks->removeElement($stack);

        return $this;
    }
}
