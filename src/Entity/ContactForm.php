<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class ContactForm
{

    #[Assert\Length(
        max: 255,
    )]
    #[Assert\NotBlank]
    private $firstName;

    #[Assert\Length(
        max: 255,
    )]
    #[Assert\NotBlank]
    private $lastName;

    #[Assert\Length(
        max: 255
    )]
    #[Assert\NotBlank]
    private $phone;

    #[Assert\Length(
        max: 255
    )]
    #[Assert\NotBlank]
    #[Assert\Email]
    private $email;

    #[Assert\NotBlank]
    private $message;


    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
