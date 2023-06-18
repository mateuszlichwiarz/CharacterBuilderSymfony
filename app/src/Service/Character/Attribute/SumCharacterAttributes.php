<?php

namespace App\Service\Character\Attribute;

use App\Entity\Character;

class SumCharacterAttributes
{
    public function getSum(Character $character): int
    {
        $str = $character->getStr();
        $dex = $character->getDex();
        $wis = $character->getWis();

        return $str+$dex+$wis;
    }
}