<?php

namespace App\Entity;

use App\Repository\HelloAssoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: HelloAssoRepository::class)]
class HelloAsso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[Assert\NotBlank]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le lien ne doit pas dépasser {{ limit }} caractères'
    )]
    #[ORM\Column(type: 'string', length: 255)]
    private string $link;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }
}
