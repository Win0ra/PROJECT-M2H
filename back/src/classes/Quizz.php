<?php

namespace LaBouzinerie\Classes;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Quizz {
    // PROPERTIES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column()]
    private string $title;

    #[ORM\Column()]
    private string $description;

    #[ORM\Column()]
    private string $level;

    #[ORM\Column(type: 'boolean')]
    private bool $is_completed;

    #[ORM\OneToMany(targetEntity: Question::class, mappedBy: 'quizz')]
    private Collection $questions;

    #[ORM\ManyToOne(targetEntity: Topic::class, inversedBy: 'quizzs')]
    private Topic $topic;

    #[ORM\ManyToMany(targetEntity : UserIdentified::class, mappedBy : 'favorites_quizz' )]
    private Collection $users_who_liked;

    // CONSTRUCTOR
    public function __construct(string $title, string $description, string $level, bool $is_completed, Topic $topic) {
        $this->title = $title;
        $this->description = $description;
        $this->level = $level;
        $this->is_completed = $is_completed;
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
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

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
     * Get the value of level
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * Set the value of level
     */
    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of is_completed
     */
    public function isIsCompleted(): bool
    {
        return $this->is_completed;
    }

    /**
     * Set the value of is_completed
     */
    public function setIsCompleted(bool $is_completed): self
    {
        $this->is_completed = $is_completed;

        return $this;
    }

    /**
     * Get the value of questions
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    /**
     * Set the value of questions
     */
    public function setQuestions(Collection $questions): self
    {
        $this->questions = $questions;

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

    /**
     * Get the value of users_who_liked
     */
    public function getUsersWhoLiked(): Collection
    {
        return $this->users_who_liked;
    }

    /**
     * Set the value of users_who_liked
     */
    public function setUsersWhoLiked(Collection $users_who_liked): self
    {
        $this->users_who_liked = $users_who_liked;

        return $this;
    }
}
