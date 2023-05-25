<?php

namespace App\Service\Equipment\Armor\Updater;

use App\Repository\ArmorRepository;
use App\Service\Abstract\AbstractUpdater;

class ArmorUpdater extends AbstractUpdater
{
    public function __construct( private ArmorRepository $armorRepository ){}

    public function update(object $armor): void
    {
        //fill
    }
}