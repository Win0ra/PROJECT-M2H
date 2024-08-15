<?php

namespace LaBouzinerie\Classes;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Ladder {
    // PROPERTIES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\OneToOne(targetEntity : UserIdentified::class, inversedBy: 'ladder')]
    private UserIdentified $player;

    #[ORM\Column(type: 'integer')]
    private int $elo;

    #[ORM\Column(type: 'integer')]
    private int $rank;

    #[ORM\ManyToOne(targetEntity : Topic::class, inversedBy: 'ladders')]
    private Topic $topic;

    // CONSTRUCTOR
    public function __construct(int $id, UserIdentified $player, int $elo, int $rank, Topic $topic) {
        $this->id = $id;
        $this->player = $player;
        $this->elo = $elo;
        $this->rank = $rank;
        $this->topic = $topic;
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
     * Get the value of player
     */
    public function getPlayer(): UserIdentified
    {
        return $this->player;
    }

    /**
     * Set the value of player
     */
    public function setPlayer(UserIdentified $player): self
    {
        $this->player = $player;

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

    /**
     * Get the value of topic
     */
    public function getTopic(): Topic
    {
        return $this->topic;
    }

    /**
     * Set the value of topic
     */
    public function setTopic(Topic $topic): self
    {
        $this->topic = $topic;

        return $this;
    }
}