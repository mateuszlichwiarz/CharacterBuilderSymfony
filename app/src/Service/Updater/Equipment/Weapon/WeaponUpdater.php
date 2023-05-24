<?php

namespace App\Service\Updater;

use App\Repository\WeaponRepository;
use App\Service\Updater\AbstractUpdater;

class WeaponUpdater extends AbstractUpdater
{
    public function __construct(
        private WeaponRepository $weaponRepository
    ){}

    public function update(object $weapon): void
    {
        //fill
        $this->weaponRepository->update();
    }
}