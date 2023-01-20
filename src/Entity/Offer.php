<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OfferRepository::class)]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le titre de l\'offre ne peut pas être vide')]
    #[Assert\Length(
        max: 100,
        maxMessage: 'Le titre saisi est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'L\'adresse de l\'offre ne peut pas être vide')]
    #[Assert\Length(
        max: 38,
        maxMessage: 'L\'adresse saisie est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $address = null;

    #[ORM\ManyToOne(inversedBy: 'offers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(Contract::class)]
    private ?Contract $contract = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $publicationDate = null;

    #[ORM\ManyToOne(inversedBy: 'offers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(Recruiter::class)]
    private ?Recruiter $recruiter = null;

    #[ORM\ManyToMany(targetEntity: Stack::class, inversedBy: 'offers')]
    #[Assert\Type(Collection::class)]
    private Collection $stack;

    #[ORM\ManyToOne(inversedBy: 'offers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(WorkField::class)]
    private ?WorkField $workField = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le code postal ne peut pas être vide')]
    #[Assert\Regex(
        pattern: '/\d{5}/',
        match: true,
        message: 'Le code postal doit contenir 5 chiffres',
    )]
    #[Assert\Length(
        max: 5,
        maxMessage: 'Le code postal saisi est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $postalCode = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Le nom de la ville ne peut pas être vide')]
    #[Assert\Length(
        max: 38,
        maxMessage: 'Le nom de la ville saisi est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $city = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\Length(
        max: 38,
        maxMessage: 'Le complément d\'adresse saisi est trop long, 
        il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $addressComplement = null;

    #[ORM\OneToMany(mappedBy: 'offer', targetEntity: Candidacy::class)]
    private Collection $candidacies;

    #[ORM\Column(nullable: true)]
    private ?int $department = null;

    public function __construct()
    {
        $this->stack = new ArrayCollection();
        $this->candidacies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        $this->publicationDate = new DateTime('now');

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getContract(): ?Contract
    {
        return $this->contract;
    }

    public function setContract(?Contract $contract): self
    {
        $this->contract = $contract;

        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getRecruiter(): ?Recruiter
    {
        return $this->recruiter;
    }

    public function setRecruiter(?Recruiter $recruiter): self
    {
        $this->recruiter = $recruiter;

        return $this;
    }

    /**
     * @return Collection<int, Stack>
     */
    public function getStack(): Collection
    {
        return $this->stack;
    }

    public function addStack(Stack $stack): self
    {
        if (!$this->stack->contains($stack)) {
            $this->stack->add($stack);
        }

        return $this;
    }

    public function removeStack(Stack $stack): self
    {
        $this->stack->removeElement($stack);

        return $this;
    }

    public function getWorkField(): ?WorkField
    {
        return $this->workField;
    }

    public function setWorkField(?WorkField $workField): self
    {
        $this->workField = $workField;

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

    public function getAddressComplement(): ?string
    {
        return $this->addressComplement;
    }

    public function setAddressComplement(string $addressComplement): self
    {
        $this->addressComplement = $addressComplement;

        return $this;
    }

    /**
     * @return Collection<int, Candidacy>
     */
    public function getCandidacies(): Collection
    {
        return $this->candidacies;
    }

    public function addCandidacy(Candidacy $candidacy): self
    {
        if (!$this->candidacies->contains($candidacy)) {
            $this->candidacies->add($candidacy);
            $candidacy->setOffer($this);
        }

        return $this;
    }

    public function getDepartment(): ?int
    {
        return $this->department;
    }

    public function setDepartment(?int $department): self
    {
        $this->department = $department;

        return $this;
    }
}
