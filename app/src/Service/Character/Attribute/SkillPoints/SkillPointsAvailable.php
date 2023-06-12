<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\SkillPoints;

use App\Entity\Character;

use App\Service\Character\Attribute\Interface\AttributeAvailableInterface;

class SkillPointsAvailable implements AttributeAvailableInterface
{
    public function isAvailable(Character $character): bool
    {
        return $character->getSkillPoints() > 0 ? true : false;
    }
}