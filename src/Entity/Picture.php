<?php

namespace App\Entity;

use App\Entity\Event;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PictureRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(inversedBy: 'pictures', targetEntity: Event::class)]
    private Event $event;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    public function __construct()
    {
        $this->event = new Event();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Event
     */
    public function getEvent(): Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
