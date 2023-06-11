<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Strength;

use App\Entity\Character;

class StrengthDiff
{
    static public function getDiff(Character $character, int $inputValue): int
    {
        return $inputValue - $character->getStr();
    }
}