<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['post:read'])]
    private ?string $name = null;

    /*#[ORM\OneToOne(mappedBy: 'images', cascade: ['persist', 'remove'])]
    private ?Place $place = null;*/

    public function getId(): ?int
    {
        return $this->id;
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
    /*
    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(Place $place): self
    {
        // set the owning side of the relation if necessary
        if ($place->getImages() !== $this) {
            $place->setImages($this);
        }

        $this->place = $place;

        return $this;
    }*/
}
