<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

use App\Entity\Character;
use App\Service\Character\Attribute\RequestAttributes;

class SkillPointsCalculator
{
    public function calculate(Character $character, RequestAttributes $requestAttributes): int
    {
        $sumRequestAttr   = $requestAttributes->getSumAttributes();
        $sumCharacterAttr = $character->getStr() + $character->getDex() + $character->getWis();

        return $character->getSkillPoints() - abs($sumCharacterAttr - $sumRequestAttr);
        }
}