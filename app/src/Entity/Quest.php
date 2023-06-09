<?php

namespace App\Entity;

use App\Repository\QuestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestRepository::class)]
class Quest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateInterval $timeLength = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $expirience = null;

    #[ORM\Column]
    private ?int $reward = null;

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

    public function getTimeLength(): ?\DateInterval
    {
        return $this->timeLength;
    }

    public function setTimeLength(\DateInterval $timeLength): self
    {
        $this->timeLength = $timeLength;

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

    public function getExpirience(): ?int
    {
        return $this->expirience;
    }

    public function setExpirience(int $expirience): self
    {
        $this->expirience = $expirience;

        return $this;
    }

    public function getReward(): ?int
    {
        return $this->reward;
    }

    public function setReward(int $reward): self
    {
        $this->reward = $reward;

        return $this;
    }
}
