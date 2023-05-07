<?php

namespace App\Service\Character;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Repository\UserRepository;

use App\Service\Equipment\ArmorEquipment;
use App\Service\Equipment\WeaponEquipment;

class CharacterBuilder extends AbstractCharacter
{
    private $userRepository;

    public function __constuct(
        UserRepository $userRepository,
        )
    {
        $this->userRepository = $userRepository;

    }

    public function create($object, WeaponEquipment $weaponEquipment, ArmorEquipment $armorEquipment)
    {

        $character = $object;
        $character->setExp('0');
        $character->setLvl('1');
        $character->setSkillPoints(10);
        $character->WeaponEquipment->PutOnByName('fists');
        $character->ArmorEquipment->PutOnByName('pants');


        $this->userRepository->setCharacter($character);
        
    }
}

//$characterBuilder = $this->CharacterBuilder->create();