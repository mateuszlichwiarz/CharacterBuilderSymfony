<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Strength;

use App\Entity\Character;

class StrengthValidator
{   
    public function getValid(Character $character, int $inputValue): bool
    {
        if($inputValue > $character->getStr()) {
            return true;
        }elseif($inputValue < $character->getStr()) {
            //errorLogger
            return false;
        }elseif($inputValue == $character->getStr()) {
            //errorLogger
            return false;
        }elseif($inputValue == 0) {
            //errorLogger
            return false;
        }else {
            //errorLogger
            return false;
        }
    }
}