<?php

namespace App\Entity;

use App\Entity\WorkField;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\StackRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: StackRepository::class)]
class Stack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: WorkField::class, inversedBy: 'stacks')]
    private Collection $workField;

    public function __construct()
    {
        $this->workField = new ArrayCollection();
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

    /**
     * @return Collection<int, WorkField>
     */
    public function getWorkField(): Collection
    {
        return $this->workField;
    }

    public function addWorkField(WorkField $workField): self
    {
        if (!$this->workField->contains($workField)) {
            $this->workField->add($workField);
        }

        return $this;
    }

    public function removeWorkField(WorkField $workField): self
    {
        $this->workField->removeElement($workField);

        return $this;
    }
}
