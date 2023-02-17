<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $checkin = null;

    #[ORM\Column(length: 255)]
    private ?string $checkout = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    private ?string $zipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $adult = null;

    #[ORM\Column]
    private ?int $child = null;

    #[ORM\Column]
    private ?int $pool_adult = null;

    #[ORM\Column]
    private ?int $pool_child = null;

    #[ORM\Column]
    private ?int $position_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckin(): ?string
    {
        return $this->checkin;
    }

    public function setCheckin(string $checkin): self
    {
        $this->checkin = $checkin;

        return $this;
    }

    public function getCheckout(): ?string
    {
        return $this->checkout;
    }

    public function setCheckout(string $checkout): self
    {
        $this->checkout = $checkout;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAdult(): ?int
    {
        return $this->adult;
    }

    public function setAdult(int $adult): self
    {
        $this->adult = $adult;

        return $this;
    }

    public function getChild(): ?int
    {
        return $this->child;
    }

    public function setChild(int $child): self
    {
        $this->child = $child;

        return $this;
    }

    public function getPoolAdult(): ?int
    {
        return $this->pool_adult;
    }

    public function setPoolAdult(int $pool_adult): self
    {
        $this->pool_adult = $pool_adult;

        return $this;
    }

    public function getPoolChild(): ?int
    {
        return $this->pool_child;
    }

    public function setPoolChild(int $pool_child): self
    {
        $this->pool_child = $pool_child;

        return $this;
    }

    public function getPositionId(): ?int
    {
        return $this->position_id;
    }

    public function setPositionId(int $position_id): self
    {
        $this->position_id = $position_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
