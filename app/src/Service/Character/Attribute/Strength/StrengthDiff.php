<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Strength;

use App\Entity\Character;
use App\Service\Character\Attribute\Interface\AttributeDiffInterface;

class StrengthDiff implements AttributeDiffInterface
{
    public function getDiff(Character $character, int $inputValue): int
    {
        return $inputValue - $character->getStr();
    }
}