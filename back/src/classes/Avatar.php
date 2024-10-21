<?php

namespace LaBouzinerie\Classes;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Avatar {
    // PROPERTIES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column()]
    private string $path;

    #[ORM\ManyToMany(targetEntity : UserGuest::class, mappedBy : 'avatars' )]
    private Collection $users;

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
     * Get the value of users
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    /**
     * Set the value of users
     */
    public function setUsers(Collection $users): self
    {
        $this->users = $users;

        return $this;
    }
}