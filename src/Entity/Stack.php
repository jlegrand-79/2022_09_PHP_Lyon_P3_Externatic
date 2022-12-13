<?php

namespace App\Entity;

use App\Repository\StackRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StackRepository::class)]
class Stack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Field::class, inversedBy: 'stacks')]
    private Collection $field;

    public function __construct()
    {
        $this->field = new ArrayCollection();
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
     * @return Collection<int, Field>
     */
    public function getField(): Collection
    {
        return $this->field;
    }

    public function addField(Field $field): self
    {
        if (!$this->field->contains($field)) {
            $this->field->add($field);
        }

        return $this;
    }

    public function removeField(Field $field): self
    {
        $this->field->removeElement($field);

        return $this;
    }
}
