<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\SkillPoints;

use App\Entity\Character;

use App\Service\Character\Attribute\SkillPoints\AttributeAvailableInterface;

class SkillPointsAvailable implements AttributeAvailableInterface
{
    public function checkAvailable(Character $character): bool
    {
        if($character->getSkillPoints() > 0) {
            return true;
        }else {
            return false;
        }
    }
}