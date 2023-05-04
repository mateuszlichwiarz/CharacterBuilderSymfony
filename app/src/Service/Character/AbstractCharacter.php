<?php

namespace App\Service\Character;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Repository\CharacterRepository;


class AbstractCharacter
{
    public function __construct(
        private security $security,
        private CharacterRepository $characterRepository,
    ){}
}