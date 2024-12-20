<?php

namespace LaBouzinerie\Classes;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Question {
    // PROPERTIES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column()]
    private string $statement;

    #[ORM\Column()]
    private string $answer;

    #[ORM\OneToMany(targetEntity: Choice::class, mappedBy: 'question')]
    private Collection $choices;

    #[ORM\ManyToOne(targetEntity: Quizz::class, inversedBy: 'questions')]
    private Quizz $quizz;

    // CONSTRUCTOR
    public function __construct(string $statement, string $answer, Quizz $quizz) {
        $this->statement = $statement;
        $this->answer = $answer;
        $this->quizz = $quizz;
    }

    // METHODS
        // On peut renseigner une méthode qui transforme les mots inséré dans une casse prédéfinit pour assurer la correspondance avec l'answer


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
     * Get the value of statement
     */
    public function getStatement(): string
    {
        return $this->statement;
    }

    /**
     * Set the value of statement
     */
    public function setStatement(string $statement): self
    {
        $this->statement = $statement;

        return $this;
    }

    /**
     * Get the value of answer
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * Set the value of answer
     */
    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get the value of choices
     */
    public function getChoices(): Collection
    {
        return $this->choices;
    }

    /**
     * Set the value of choices
     */
    public function setChoices(Collection $choices): self
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * Get the value of quizz
     */
    public function getQuizz(): Quizz
    {
        return $this->quizz;
    }

    /**
     * Set the value of quizz
     */
    public function setQuizz(Quizz $quizz): self
    {
        $this->quizz = $quizz;

        return $this;
    }
}