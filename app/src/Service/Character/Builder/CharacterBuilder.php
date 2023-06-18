<?php declare(strict_types=1);

namespace App\Service\Character\Builder;

use App\Entity\Character;
use App\Entity\Armor;
use App\Entity\Weapon;
use Psr\Log\LoggerInterface;

class CharacterBuilder
{
    private Weapon $weapon;
    private Armor $armor;
    private string $name;
    private int $expCapThreshold;
    private int $skillPoints;
    private int $hp;
    private int $lvl;
    private int $exp;
    private int $str;
    private int $dex;
    private int $wis;

    public function __construct(
        //private LoggerInterface $logger
        ){}

    public function buildCharacter(): Character
    {
        return new Character(
            $this->name,
            $this->hp,
            $this->lvl,
            $this->exp,
            $this->expCapThreshold,
            $this->skillPoints,
            $this->str,
            $this->dex,
            $this->wis,
            $this->weapon,
            $this->armor,
            );
    }

    public function setLvl(int $lvl): self
    {
        $this->lvl = $lvl;
        return $this;
    }

    public function setExp(int $exp): self
    {
        $this->exp = $exp;
        return $this;
    }

    public function setExpCapThreshold(int $expCapThreshold): self
    {
        $this->expCapThreshold = $expCapThreshold;
        return $this;
    }

    public function setSkillPoints(int $skillPoints): self
    {
        $this->skillPoints = $skillPoints;
        return $this;
    }

    public function setStr(int $str): self
    {
        $this->str = $str;
        return $this;
    }

    public function setDex(int $dex): self
    {
        $this->dex = $dex;
        return $this;
    }

    public function setWis(int $wis): self
    {
        $this->wis = $wis;
        return $this;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function equipArmor(Armor $armor): self
    {
        $this->armor = $armor;
        return $this;
    }

    public function equipWeapon(Weapon $weapon): self
    {
        $this->weapon = $weapon;
        return $this;
    }
}