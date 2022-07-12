<?php

namespace App\Entity;

use App\Repository\ActualityRepository;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ActualityRepository::class)]
#[Vich\Uploadable]
class Actuality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le titre ne doit pas dépasser {{ limit }} caractères'
    )]
    private string $title;

    #[ORM\Column(type: 'datetime')]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    private DateTimeInterface $date;

    #[Vich\UploadableField(mapping: 'actu_image', fileNameProperty: 'image')]
    #[Assert\Image(
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp'],
        maxSize: '2M',
        groups: ['add', 'default'],
    )]
    #[Assert\NotBlank(groups: ['add'])]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $image = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'Ce champ ne peut pas être vide')]
    private string $description;

    #[ORM\Column(type: 'string', length: 80)]
    #[Assert\Length(
        max: 80,
        maxMessage: 'La phrase d\'accroche ne doit pas dépasser {{ limit }} caractères'
    )]
    private string $catchPhrase;

    #[ORM\Column(type: 'string', length: 255)]
    private string $slug;

    public function __construct()
    {
        $this->updatedAt = new DateTimeImmutable();
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCatchPhrase(): ?string
    {
        return $this->catchPhrase;
    }

    public function setCatchPhrase(string $catchPhrase): self
    {
        $this->catchPhrase = $catchPhrase;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): ?self
    {
        $this->image = $image;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
