<?php

namespace App\Entity;

use App\Repository\RecruiterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RecruiterRepository::class)]
class Recruiter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le prénom ne peut pas être vide.')]
    #[Assert\Length(
        max: 50,
        maxMessage: 'Le prénom saisi {{ value }} est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $firstname = null;

    #[Assert\NotBlank(message: 'Le nom ne peut pas être vide.')]
    #[Assert\Length(
        max: 50,
        maxMessage: 'Le nom saisi {{ value }} est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le numéro de téléphone ne peut pas être vide.')]
    #[Assert\Regex(
        pattern: '/\d{10,15}/',
        match: true,
        message: 'Le numéro de téléphone saisi {{ value }} est incorrect, 
        il devrait contenir entre 10 à 15 chiffres',
    )]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'L\'adresse ne peut pas être vide.')]
    #[Assert\Length(
        max: 38,
        maxMessage: 'L\'adresse saisie est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $address = null;

    #[ORM\ManyToOne(inversedBy: 'recruiters')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(Partner::class)]
    private ?Partner $partner = null;

    #[ORM\OneToOne(inversedBy: 'recruiter', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(User::class)]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'recruiter', targetEntity: Offer::class)]
    #[Assert\Type(Collection::class)]
    private Collection $offers;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'La fonction ne peut pas être vide.')]
    #[Assert\Length(
        max: 50,
        maxMessage: 'La fontion saisie est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $position = null;

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
        message: 'Le code postal saisi {{ value }} est incorrect, 
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

    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): self
    {
        $this->partner = $partner;

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    /**
     * @return Collection<int, Offer>
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers->add($offer);
            $offer->setRecruiter($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getRecruiter() === $this) {
                $offer->setRecruiter(null);
            }
        }

        return $this;
    }

    public function getFullName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

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
}
