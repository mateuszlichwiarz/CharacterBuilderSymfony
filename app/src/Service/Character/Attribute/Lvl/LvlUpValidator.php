<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Lvl;

class LvlUpValidator
{
    public function getValid(int $exp, int $lvl): bool|\Exception
    {
        if($exp >= 500*$lvl) {
            return true;
        }elseif($exp < 500*$lvl) {
            return new \Exception("Your character hasn't enaugh expirience to get new level");
        }
    }
}