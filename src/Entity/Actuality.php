<?php

namespace App\Entity;

use App\Repository\ActualityRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ActualityRepository::class)]
class Actuality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        max: 255,
    )]
    #[Assert\NotBlank]
    private string $title;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotBlank]
    #[Assert\DateTime]
    private DateTimeInterface $date;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        max: 255,
    )]
    #[Assert\NotBlank]
    private string $image;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank]
    private string $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
