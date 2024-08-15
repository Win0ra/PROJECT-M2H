<?php

namespace LaBouzinerie\Classes;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Topic {
    // PROPERTIES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column()]
    private string $name;

    #[ORM\Column()]
    private string $description;

    #[ORM\Column()]
    private string $color;

    #[ORM\OneToMany(targetEntity : Ladder::class, mappedBy : 'topic')]
    private Collection $ladders;

    #[ORM\OneToMany(targetEntity : Quizz::class, mappedBy : 'topic')]
    private Collection $quizzs;

    // CONSTRUCTOR
    public function __construct(int $id, string $name, string $description, string $color) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->color = $color;
    }

    // METHODS

    // GETTER & SETTER
    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Set the value of color
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of ladders
     */
    public function getLadders(): Collection
    {
        return $this->ladders;
    }

    /**
     * Set the value of ladders
     */
    public function setLadders(Collection $ladders): self
    {
        $this->ladders = $ladders;

        return $this;
    }

    /**
     * Get the value of quizzs
     */
    public function getQuizzs(): Collection
    {
        return $this->quizzs;
    }

    /**
     * Set the value of quizzs
     */
    public function setQuizzs(Collection $quizzs): self
    {
        $this->quizzs = $quizzs;

        return $this;
    }
}
