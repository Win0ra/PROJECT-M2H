<?php

namespace LaBouzinerie\Classes;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table]
class UserPremium extends UserIdentified {
    // PROPERTIES
    #[ORM\Column()]
    private string $subscription_type;

    #[ORM\Column()]
    private string $cc_number;

    // CONSTRUCTOR
    public function __construct(string $pseudo, int $elo, string $last_name, string $first_name, DateTime $birthday, string $email, string $password, string $subscription_type, string $cc_number) {
        $this->pseudo = $pseudo;
        $this->elo = $elo;
        $this->last_name = $last_name;
        $this->first_name = $first_name;
        $this->birthday = $birthday;
        $this->email = $email;
        $this->password = $password;
        $this->subscription_type = $subscription_type;
        $this->cc_number = $cc_number;
    }
    // METHODS

    // GETTER & SETTER
    /**
     * Get the value of subscription_type
     */
    public function getSubscriptionType(): string
    {
        return $this->subscription_type;
    }

    /**
     * Set the value of subscription_type
     */
    public function setSubscriptionType(string $subscription_type): self
    {
        $this->subscription_type = $subscription_type;

        return $this;
    }

    /**
     * Get the value of cc_number
     */
    public function getCcNumber(): string
    {
        return $this->cc_number;
    }

    /**
     * Set the value of cc_number
     */
    public function setCcNumber(string $cc_number): self
    {
        $this->cc_number = $cc_number;

        return $this;
    }
}