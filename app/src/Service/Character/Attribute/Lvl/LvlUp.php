<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Lvl;

use App\Entity\Character;
use App\Repository\CharacterRepository;

class LvlUp
{
    //xml import
    private int $expCapThreshold = 1000;
    //class HpThreshold
    private float $hpFactor = 0.20;

    public function __construct(
        private CharacterRepository $characterRepository
    ){}

    public function execute(Character $character): void
    {
        if($character->getExp() >= $character->getExpCapThreshold())
        {
            $character
                ->changeHp($this->newHp($character))
                ->changeExp($this->restOfExpLeft($character))
                ->changeExpCapThreshold($this->newExpCap($character))
                ->changeLvl($character->getLvl() + 1)
                ->changeSkillPoints($this->newSkillPoints($character))
                ;
            $this->characterRepository->save($character, true);
        }
    }

    private function newHp(Character $character): int
    {
        $newHp = $character->getHp() + round($character->getHp() * $this->hpFactor);
        return intval($newHp);
    }

    private function newExpCap(Character $character): int
    {
        return $character->getExpCapThreshold() + $this->expCapThreshold;
    }
    
    private function restOfExpLeft(Character $character): int
    {
        return $character->getExp() - $character->getExpCapThreshold();
    }

    public function setHpFactor(float $factor): void
    {
        $this->hpFactor = $factor;
        return;
    }

    public function setExpCapThreshold(int $threshold): void
    {
        $this->expCapThreshold = $threshold;
        return;
    }
}