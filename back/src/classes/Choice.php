<?php

namespace LaBouzinerie\Classes;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class Choice {
    // PROPERTIES
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column()]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Question::class, inversedBy: 'choices')]
    private Question $question;

    // CONSTRUCTOR
    public function __construct(int $id, string $name, Question $question) {
        $this->id = $id;
        $this->name = $name;
        $this->question = $question;
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
     * Get the value of question
     */
    public function getQuestion(): Question
    {
        return $this->question;
    }

    /**
     * Set the value of question
     */
    public function setQuestion(Question $question): self
    {
        $this->question = $question;

        return $this;
    }
}