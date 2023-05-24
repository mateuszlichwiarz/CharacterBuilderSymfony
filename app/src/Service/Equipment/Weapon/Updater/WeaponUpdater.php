<?php

namespace App\Service\Equipment\Weapon\Updater;

use App\Repository\WeaponRepository;
use App\Service\Abstract\AbstractUpdater;

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