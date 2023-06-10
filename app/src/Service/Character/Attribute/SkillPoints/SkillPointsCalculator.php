<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\SkillPoints;

use App\Entity\Character;

class SkillPointsCalculator
{
    public function calculate(character $character, int $diffAttributeValue): int
    {
        $skillPoints = $character->getSkillPoints();
        $skillPoints -= $diffAttributeValue;
        return $skillPoints;
    }
}