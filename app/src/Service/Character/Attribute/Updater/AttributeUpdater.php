<?php

namespace App\Service\Character\Updater;

use App\Entity\Character;
use App\Repository\CharacterRepository;

class AttributeUpdater
{
    public function __construct(private CharacterRepository $characterRepository){}

    public function update(Character $character): void
    {
        $this->characterRepository->save($character, true);
    }
}