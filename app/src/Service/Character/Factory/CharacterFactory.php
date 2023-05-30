<?php declare(strict_types=1);

namespace App\Service\Character\Factory;

use App\Entity\Character;
use App\Service\Character\Factory\CharacterFactoryInterface;

class CharacterFactory implements CharacterFactoryInterface
{
    public function createCharacter(int $exp,int $lvl,int $skillPoints ): Character
    {
        $character = new Character();
        $character
            ->setExp($exp)
            ->setLvl($lvl)
            ->setSkillPoints($skillPoints);
        return $character;
    }
}