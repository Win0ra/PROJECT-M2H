<?php

namespace LaBouzinerie\Classes;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'status', type: Types::STRING)]
#[ORM\DiscriminatorMap(array(
    'guest' => UserGuest::class,
    'identified' => UserIdentified::class,
    'premium' => UserPremium::class
))]
class UserGuest {
    // PROPERTIES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected int $id;

    #[ORM\Column()]
    protected string $pseudo; // random pseudo -> guest123 

    #[ORM\Column(type: 'integer')]
    protected int $elo;

    #[ORM\ManyToMany(targetEntity : Avatar::class, inversedBy: 'users')]
    #[ORM\JoinTable(name : 'user_avatar')]
    protected Collection $avatars; // random avatar

    // CONSTRUCTOR
    public function __construct(int $id, string $pseudo, int $elo = 0) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->elo = $elo;
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
     * Get the value of pseudo
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     */
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of elo
     */
    public function getElo(): int
    {
        return $this->elo;
    }

    /**
     * Set the value of elo
     */
    public function setElo(int $elo): self
    {
        $this->elo = $elo;

        return $this;
    }

    /**
     * Get the value of avatars
     */
    public function getAvatars(): Collection
    {
        return $this->avatars;
    }

    /**
     * Set the value of avatars
     */
    public function setAvatars(Collection $avatars): self
    {
        $this->avatars = $avatars;

        return $this;
    }
}