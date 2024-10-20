<?php

namespace LaBouzinerie\Classes;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class UserIdentified extends UserGuest {
    // PROPERTIES
    #[ORM\Column()]
    protected string $last_name;

    #[ORM\Column()]
    protected string $first_name;

    #[ORM\Column(type: 'date')]
    protected DateTime $birthday;

    #[ORM\Column()]
    protected string $email;

    #[ORM\Column()]
    protected string $password;

    #[ORM\OneToOne(targetEntity : Ladder::class, mappedBy : 'player')]
    protected Ladder $ladder;

    #[ORM\OneToMany(targetEntity : Picture::class, mappedBy : 'user')]
    protected Collection $pictures;

    #[ORM\ManyToMany(targetEntity : Quizz::class, inversedBy: 'users_who_liked')]
    #[ORM\JoinTable(name : 'fav_user_quizz')]
    protected Collection $favorites_quizz;
    
    // CONSTRUCTOR
    public function __construct(int $id, string $pseudo, int $elo, string $last_name, string $first_name, DateTime $birthday, string $email, string $password, Ladder $ladder) {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->elo = $elo;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->birthday = $birthday;
        $this->email = $email;
        $this->password = $password;
        $this->ladder = $ladder;
    }

    // METHODS

    // GETTER & SETTER
    /**
     * Get the value of last_name
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of birthday
     */
    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     */
    public function setBirthday(DateTime $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of ladder
     */
    public function getLadder(): Ladder
    {
        return $this->ladder;
    }

    /**
     * Set the value of ladder
     */
    public function setLadder(Ladder $ladder): self
    {
        $this->ladder = $ladder;

        return $this;
    }

    /**
     * Get the value of pictures
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    /**
     * Set the value of pictures
     */
    public function setPictures(Collection $pictures): self
    {
        $this->pictures = $pictures;

        return $this;
    }

    /**
     * Get the value of favorites_quizz
     */
    public function getFavoritesQuizz(): Collection
    {
        return $this->favorites_quizz;
    }

    /**
     * Set the value of favorites_quizz
     */
    public function setFavoritesQuizz(Collection $favorites_quizz): self
    {
        $this->favorites_quizz = $favorites_quizz;

        return $this;
    }
}