<?php

namespace LaBouzinerie\Classes;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'ladder_user')]
class LadderUser {
    // PROPERTIES
    // #[ORM\Id]
    // #[ORM\GeneratedValue]
    // #[ORM\Column(type: 'integer')]
    // private int $id;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Ladder::class, inversedBy: 'ladderUsers')]
    #[ORM\JoinColumn(name: 'ladder_id', referencedColumnName: 'id', nullable: false)]
    // ReferencedColumnName permet d'expliciter le nom de la colonne vers laquelle la clé étrangère va pointer.
    // Par défaut, Doctrine suppose que c'est la colonne 'id'. Donc en soit, ici, c'était pas nécessaire.
    private Ladder $ladder;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: UserIdentified::class, inversedBy: 'ladderUsers')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false)]
    private UserIdentified $user;

    #[ORM\Column(type: 'integer')]
    private int $elo;

    #[ORM\Column(type: 'integer')]
    private int $rank;

    // CONSTRUCTOR
    public function __construct(int $elo, int $rank) {
        $this->elo = $elo;
        $this->rank = $rank;
    }

    // GETTER & SETTER
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
    public function setLadder(int $ladder): self
    {
        $this->ladder = $ladder;

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
    public function setUser(int $user): self
    {
        $this->user = $user;

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
     * Get the value of rank
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * Set the value of rank
     */
    public function setRank(int $rank): self
    {
        $this->rank = $rank;

        return $this;
    }
}