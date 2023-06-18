<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\SkillPoints;

use App\Entity\Character;

class SkillPoints
{
    public function isGreaterThanZero(Character $character): bool
    {
        return $character->getSkillPoints() > 0 ? true : false;
    }
}