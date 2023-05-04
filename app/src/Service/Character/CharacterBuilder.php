<?php

namespace App\Service\Character;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Repository\CharacterRepository;

class CharacterBuilder extends AbstractCharacter
{
    private $characterRepository;

    public function __constuct(
        CharacterRepository $characterRepository,
        )
    {
        $this->characterRepository = $characterRepository;

    }


    public function create($object, Weapon $weapon, Armor $armor)
    {
        $user = $this->getSecurityUser();

        $character = $object;

        $character->setExp('0');
        $character->setLvl('1');
        $character->setSkillPoints(10);
        $character->Weapon->PutOnByName('fists');
        $character->Armor->PutOnByName('pants');

        $character->setUser();

        $this->characterRepository->save($character);
        
    }
}