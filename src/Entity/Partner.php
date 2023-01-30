<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PartnerRepository::class)]
class Partner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le logo saisi {{ value }} est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $logo = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom ne peut pas être vide.')]
    #[Assert\Length(
        max: 50,
        maxMessage: 'Le nom saisi {{ value }} est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $name = null;

    #[ORM\Column(length: 1000)]
    #[Assert\NotBlank(message: 'La description ne peut pas être vide.')]
    #[Assert\Length(
        max: 1000,
        maxMessage: 'La description saisie {{ value }} est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'URL ne peut pas être vide.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "L'URL saisi {{ value }} est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères",
    )]
    private ?string $url = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'URL de l'image ne peut pas être vide.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "L'URL saisi {{ value }} est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères",
    )]
    private ?string $picture = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'adresse ne peut pas être vide.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "L'adresse saisie {{ value }} est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères",
    )]
    private ?string $address = null;

    #[ORM\OneToMany(mappedBy: 'partner', targetEntity: Recruiter::class)]
    private Collection $recruiters;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: "L'adresse de complément saisie {{ value }} est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères",
    )]
    private ?string $addressComplement = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le code postal ne peut pas être vide.")]
    #[Assert\Length(
        max: 6,
        maxMessage: "Le code postal saisie {{ value }} est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères",
    )]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La ville ne peut pas être vide.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "La ville saisie {{ value }} est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères",
    )]
    private ?string $city = null;

    public function __construct()
    {
        $this->recruiters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

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
     * @return Collection<int, Recruiter>
     */
    public function getRecruiters(): Collection
    {
        return $this->recruiters;
    }

    public function addRecruiter(Recruiter $recruiter): self
    {
        if (!$this->recruiters->contains($recruiter)) {
            $this->recruiters->add($recruiter);
            $recruiter->setPartner($this);
        }

        return $this;
    }

    public function removeRecruiter(Recruiter $recruiter): self
    {
        if ($this->recruiters->removeElement($recruiter)) {
            // set the owning side to null (unless already changed)
            if ($recruiter->getPartner() === $this) {
                $recruiter->setPartner(null);
            }
        }

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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
