<?php

namespace App\Entity;

use App\Repository\OptionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptionsRepository::class)]
class Options
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $adult_price = null;

    #[ORM\Column]
    private ?int $child_price = null;

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

    public function getAdultPrice(): ?int
    {
        return $this->adult_price;
    }

    public function setAdultPrice(int $adult_price): self
    {
        $this->adult_price = $adult_price;

        return $this;
    }

    public function getChildPrice(): ?int
    {
        return $this->child_price;
    }

    public function setChildPrice(string $child_price): self
    {
        $this->child_price = $child_price;

        return $this;
    }
}
