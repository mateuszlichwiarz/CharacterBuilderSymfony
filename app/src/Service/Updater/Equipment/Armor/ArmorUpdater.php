<?php

namespace App\Service\Updater;

use App\Repository\ArmorRepository;
use App\Service\Updater\AbstractUpdater;

class CharacterUpdater extends AbstractUpdater
{
    public function __construct(
        private ArmorRepository $characterRepository
    ){}

    public function update(object $armor): void
    {
        //fill
    }
}