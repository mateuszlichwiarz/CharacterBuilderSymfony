<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $lvl = null;

    #[ORM\Column]
    private ?int $exp = null;

    #[ORM\Column]
    private ?int $str = null;

    #[ORM\Column]
    private ?int $dex = null;

    #[ORM\Column]
    private ?int $wis = null;

    #[ORM\Column]
    private ?int $hp = null;

    #[ORM\Column]
    private ?int $skillPoints = null;

    #[ORM\ManyToOne]
    private ?Weapon $weapon = null;

    #[ORM\ManyToOne]
    private ?Armor $armor = null;

    #[ORM\OneToMany(mappedBy: 'playerCharacter', targetEntity: Tour::class)]
    private Collection $tours;

    #[ORM\OneToMany(mappedBy: 'attacker', targetEntity: Combat::class)]
    private Collection $attacker;

    #[ORM\OneToMany(mappedBy: 'defender', targetEntity: Combat::class)]
    private Collection $defender;

    #[ORM\OneToMany(mappedBy: 'winner', targetEntity: Combat::class)]
    private Collection $winner;

    public function __construct(
        string $name,
        int $hp,
        int $lvl,
        int $exp,
        int $skillPoints,
        int $str,
        int $dex,
        int $wis,
        Weapon $weapon,
        Armor $armor,
        )
    {
        $this->name = $name;
        $this->hp   = $hp;
        $this->lvl  = $lvl;
        $this->exp  = $exp;
        $this->str  = $str;
        $this->dex  = $dex;
        $this->wis  = $wis;
        $this->skillPoints = $skillPoints;
        $this->weapon = $weapon;
        $this->armor  = $armor;


        $this->tours = new ArrayCollection();
        $this->attacker = new ArrayCollection();
        $this->defender = new ArrayCollection();
        $this->winner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function changeName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function changeHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getLvl(): ?int
    {
        return $this->lvl;
    }

    public function changeLvl(int $lvl): self
    {
        $this->lvl = $lvl;

        return $this;
    }

    public function getExp(): ?int
    {
        return $this->exp;
    }

    public function changeExp(int $exp): self
    {
        $this->exp = $exp;

        return $this;
    }

    public function getStr(): ?int
    {
        return $this->str;
    }

    public function changeStr(int $str): self
    {
        $this->str = $str;

        return $this;
    }

    public function getDex(): ?int
    {
        return $this->dex;
    }

    public function changeDex(int $dex): self
    {
        $this->dex = $dex;

        return $this;
    }

    public function getWis(): ?int
    {
        return $this->wis;
    }

    public function changeWis(int $wis): self
    {
        $this->wis = $wis;

        return $this;
    }

    public function getSkillPoints(): ?int
    {
        return $this->skillPoints;
    }

    public function changeSkillPoints(int $skillPoints): self
    {
        $this->skillPoints = $skillPoints;

        return $this;
    }

    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function equipWeapon(?Weapon $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    public function getArmor(): ?Armor
    {
        return $this->armor;
    }

    public function equipArmor(?Armor $armor): self
    {
        $this->armor = $armor;

        return $this;
    }

    /**
     * @return Collection<int, Tour>
     */
    public function getTours(): Collection
    {
        return $this->tours;
    }

    public function addTour(Tour $tour): self
    {
        if (!$this->tours->contains($tour)) {
            $this->tours->add($tour);
            $tour->setPlayerCharacter($this);
        }

        return $this;
    }

    public function removeTour(Tour $tour): self
    {
        if ($this->tours->removeElement($tour)) {
            // set the owning side to null (unless already changed)
            if ($tour->getPlayerCharacter() === $this) {
                $tour->setPlayerCharacter(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Combat>
     */
    public function getAttackerCombats(): Collection
    {
        return $this->attacker;
    }

    public function addAttackerCombat(Combat $attacker): self
    {
        if (!$this->attacker->contains($attacker)) {
            $this->attacker->add($attacker);
            $attacker->setAttacker($this);
        }

        return $this;
    }

    public function removeCombat(Combat $attacker): self
    {
        if ($this->attacker->removeElement($attacker)) {
            // set the owning side to null (unless already changed)
            if ($attacker->getAttacker() === $this) {
                $attacker->setAttacker(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Combat>
     */
    public function getDefenderCombats(): Collection
    {
        return $this->defender;
    }

    public function addDefenderCombat(Combat $defender): self
    {
        if (!$this->defender->contains($defender)) {
            $this->defender->add($defender);
            $defender->setDefender($this);
        }

        return $this;
    }

    public function removeDefenderCombat(Combat $defender): self
    {
        if ($this->defender->removeElement($defender)) {
            // set the owning side to null (unless already changed)
            if ($defender->getDefender() === $this) {
                $defender->setDefender(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Combat>
     */
    public function getWinnerCombats(): Collection
    {
        return $this->winner;
    }

    public function addWinnerCombat(Combat $winner): self
    {
        if (!$this->winner->contains($winner)) {
            $this->winner->add($winner);
            $winner->setWinner($this);
        }

        return $this;
    }

    public function removeWinnerCombat(Combat $winner): self
    {
        if ($this->winner->removeElement($winner)) {
            // set the owning side to null (unless already changed)
            if ($winner->getWinner() === $this) {
                $winner->setWinner(null);
            }
        }

        return $this;
    }

}
