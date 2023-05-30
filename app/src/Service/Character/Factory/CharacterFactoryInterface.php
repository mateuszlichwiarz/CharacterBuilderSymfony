<?php declare(strict_types=1);

namespace App\Service\Character\Factory;

use App\Entity\Character;

interface CharacterFactoryInterface
{
    public function createCharacter(int $exp, int $lvl, int $skillPoints): Character;
}