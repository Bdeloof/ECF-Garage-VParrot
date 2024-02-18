<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $day = null;

    #[ORM\Column(length: 50)]
    private ?string $opening_hour = null;

    #[ORM\Column(length: 50)]
    private ?string $closing_hour = null;

    #[ORM\Column(length: 50)]
    private ?string $opening_afternoon = null;

    #[ORM\Column(length: 50)]
    private ?string $closing_afternoon = null;

    #[ORM\ManyToOne(inversedBy: 'schedules')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'schedule')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Garage $garage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(\DateTimeInterface $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getOpeningHour(): ?string
    {
        return $this->opening_hour;
    }

    public function setOpeningHour(string $opening_hour): static
    {
        $this->opening_hour = $opening_hour;

        return $this;
    }

    public function getClosingHour(): ?string
    {
        return $this->closing_hour;
    }

    public function setClosingHour(string $closing_hour): static
    {
        $this->closing_hour = $closing_hour;

        return $this;
    }

    public function getOpeningAfternoon(): ?string
    {
        return $this->opening_afternoon;
    }

    public function setOpeningAfternoon(string $opening_afternoon): static
    {
        $this->opening_afternoon = $opening_afternoon;

        return $this;
    }

    public function getClosingAfternoon(): ?string
    {
        return $this->closing_afternoon;
    }

    public function setClosingAfternoon(string $closing_afternoon): static
    {
        $this->closing_afternoon = $closing_afternoon;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): static
    {
        $this->garage = $garage;

        return $this;
    }
}
