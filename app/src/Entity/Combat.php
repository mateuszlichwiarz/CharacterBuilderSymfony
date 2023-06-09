<?php

namespace App\Entity;

use App\Repository\CombatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CombatRepository::class)]
class Combat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'combats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $attacker = null;

    #[ORM\ManyToOne(inversedBy: 'defender')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $defender = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $course = [];

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'winner')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Character $winner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttacker(): ?Character
    {
        return $this->attacker;
    }

    public function setAttacker(?Character $attacker): self
    {
        $this->attacker = $attacker;

        return $this;
    }

    public function getDefender(): ?Character
    {
        return $this->defender;
    }

    public function setDefender(?Character $defender): self
    {
        $this->defender = $defender;

        return $this;
    }

    public function getCourse(): array
    {
        return $this->course;
    }

    public function setCourse(array $course): self
    {
        $this->course = $course;

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

    public function getWinner(): ?Character
    {
        return $this->winner;
    }

    public function setWinner(?Character $winner): self
    {
        $this->winner = $winner;

        return $this;
    }
}
