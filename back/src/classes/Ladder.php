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

    #[ORM\OneToMany(targetEntity : LadderUser::class, mappedBy: 'ladder', cascade: ['persist', 'remove'])] 
    // CASCADE permet d'executer automatiquement des actions sur toutes les entitées liées. 
    // Donc ici, de 'persist' et de 'remove' Ladder AINSI que les entitées liées LadderUsers.
    private Collection $ladderUsers;

    #[ORM\ManyToOne(targetEntity : Topic::class, inversedBy: 'ladders')]
    private Topic $topic;

    // CONSTRUCTOR
    public function __construct(Topic $topic) {
        $this->ladderUsers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get the value of ladderUser
     */
    public function getLadderUsers(): Collection
    {
        return $this->ladderUsers;
    }

    /**
     * Set the value of ladderUser
     */
    public function setLadderUsers(LadderUser $ladderUser): self
    {
        $this->ladderUsers[] = $ladderUser;

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