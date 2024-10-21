<?php

namespace LaBouzinerie\Classes;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Picture {
    // PROPERTIES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column()]
    private string $path;

    #[ORM\ManyToOne(targetEntity : UserIdentified::class, inversedBy : 'pictures')]
    private UserIdentified $user;

    // CONSTRUCTOR
    public function __construct(int $id, string $path) {
        $this->id = $id;
        $this->path = $path;
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
     * Get the value of path
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Set the value of path
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser(): UserIdentified
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser(UserIdentified $user): self
    {
        $this->user = $user;

        return $this;
    }
}