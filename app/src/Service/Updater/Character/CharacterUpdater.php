<?php

namespace App\Service\Updater;

use App\Repository\CharacterRepository;
use App\Service\Updater\AbstractUpdater;

class CharacterUpdater extends AbstractUpdater
{
    public function __construct(
        private CharacterRepository $characterRepository
    ){}

    public function update(object $object): void
    {
        //fill
    }
}