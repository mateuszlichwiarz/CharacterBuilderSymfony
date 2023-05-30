<?php

namespace App\Service\Character\Helper;

use App\Repository\CharacterRepository;

class CharacterHelper
{
    public function __construct( private CharacterRepository $characterRepository ){}

    public function help(object $character): bool|null
    {
        $character->getId();
        return false;
    }
}