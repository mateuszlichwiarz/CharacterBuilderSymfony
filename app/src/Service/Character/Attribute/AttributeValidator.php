<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

use App\Entity\Character;
use App\Service\Character\Attribute\SkillPoints\SkillPoints;
use App\Service\Character\Attribute\SumCharacterAttributes;
use App\Service\Character\Attribute\SkillPointsCalculator;

class AttributeValidator
{

    public function __construct(
        private SkillPoints $skillPoints,
        private SumCharacterAttributes $sumCharacterAttributes,
        private SkillPointsCalculator $spCalculator,
    ){}

    public function isValid(Character $character, RequestAttributes $requestAttributes): bool
    {
        if(($this->checkAttributes($character, $requestAttributes) &&
        $this->skillPoints->isGreaterThanZero($character) === true)) {

            if($this->spCalculator->calculate($character, $requestAttributes) <= $character->getSkillPoints()){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    private function checkAttributes(character $character, RequestAttributes $requestAttributes): bool
    {
        if($requestAttributes->getStr() >= $character->getStr() &&
           $requestAttributes->getDex() >= $character->getDex() &&
           $requestAttributes->getWis() >= $character->getWis()
        ) {
            return true;
        }else {
            return false;
        }
    }

}