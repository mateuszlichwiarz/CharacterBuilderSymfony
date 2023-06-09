<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Lvl;

use App\Entity\Character;
use App\Repository\CharacterRepository;

class LvlUp
{
    public function __construct(
        private CharacterRepository $characterRepository
    ){}

    public function up(Character $character,int $lvl): void
    {
        $character->setLvl($lvl);
        $this->characterRepository->save($character);
    }
}