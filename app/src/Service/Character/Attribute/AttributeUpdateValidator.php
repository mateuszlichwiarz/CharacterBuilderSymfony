<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

use App\Entity\Character;
use App\Service\Character\Attribute\SkillPoints\SkillPointsAvailable;
use App\Service\Character\Attribute\SkillPoints\SkillPointsDiff;
use App\Service\Character\Attribute\Strength\StrengthDiff;
use App\Service\Character\Attribute\Strength\StrengthValidator;

class AttributeUpdateValidator
{

    private array $attributes;

    public function __construct(
        private SkillPointsAvailable $spAvailable,
    )
    {}

    public function isValid(Character $character): bool
    {
        if($this->spAvailable->isAvailable($character) === true) {

            $sumRequestAttrVal = array_sum($this->attributes);
            $sumCharacterAttr = $this->getCharacterAttributesSum($character);
            $requiredSkillPoints = $sumRequestAttrVal - $sumCharacterAttr;

            if($requiredSkillPoints > 0)
            {
                if($requiredSkillPoints > $character->getSkillPoints()) {
                    return false;
                }elseif($requiredSkillPoints <= $character->getSkillPoints() ) {
                    return true;
                }
            }else{
                return false;
            }

        }else
        {
            return false;
        }
    }

    public function addAttribute(int $attr): self
    {
        $this->attributes[] = $attr;

        return $this;
    }

    private function getCharacterAttributesSum(Character $character): int
    {
        $dex = $character->getDex();
        $str = $character->getStr();
        $wis = $character->getWis();

        return $dex+$str+$wis;
    }
}