<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\SkillPoints;

use App\Entity\Character;
use App\Service\Character\Attribute\Interface\AttributeDiffInterface;

class SkillPointsDiff implements AttributeDiffInterface
{
    public function getDiff(character $character, int $diffAttributeValue): int
    {
        return $character->getSkillPoints() - $diffAttributeValue;
    }
}