<?php

namespace App\Service\Character\Updater;

use App\Repository\CharacterRepository;
use App\Service\Abstract\AbstractUpdater;
use App\Service\Character\Helper\CharacterHelper;

class CharacterUpdater extends AbstractUpdater
{
    public function __construct(
        private CharacterRepository $characterRepository,
        private CharacterHelper $characterHelper
    ){}

    public function update(object $character): void
    {
        $helper = $this->characterHelper->help($character);
        $helper === true ? $this->characterRepository->update($character) : 'notworking';
    }
}