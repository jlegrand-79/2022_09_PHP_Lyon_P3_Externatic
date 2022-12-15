<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;
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
        max: 255,
        maxMessage: 'Le titre saisie \"{{ value }}\" est trop long, il ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'L\'adresse de l\'offre ne peut pas être vide')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'L\'adresse saisie \"{{ value }}\" est trop longue, 
        elle ne devrait pas dépasser {{ limit }} caractères',
    )]
    private ?string $address = null;

    #[ORM\ManyToOne(inversedBy: 'offers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(Contract::class)]
    private ?Contract $contract = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\DateTime]
    private ?\DateTimeInterface $publicationDate = null;

    #[ORM\ManyToOne(inversedBy: 'offers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(Recruiter::class)]
    private ?Recruiter $recruiter = null;

    #[ORM\ManyToMany(targetEntity: Stack::class, inversedBy: 'offers')]
    // Valider qu'au moins une stack est renseignée dans le contrôlleur, et idéalement par le biais d'un service
    #[Assert\Type(Collection::class)]

    private Collection $stack;

    #[ORM\ManyToOne(inversedBy: 'offers')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\Type(WorkField::class)]
    private ?WorkField $workField = null;

    public function __construct()
    {
        $this->stack = new ArrayCollection();
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
}
