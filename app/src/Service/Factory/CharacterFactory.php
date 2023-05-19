<?php

namespace App\Service\Factory;

use Symfony\Bundle\SecurityBundle\Security;

use App\Repository\UserRepository;

use App\Service\Equipment\ArmorEquipment;
use App\Service\Equipment\WeaponEquipment;

class CharacterFactory
{
    public function __construct(
        private UserRepository $userRepository,
        private ArmorEquipment $armorEquipment,
        private WeaponEquipment $weaponEquipment,
        )
    {
    }

    public function create($character)
    {
        $character->setExp('0');
        $character->setLvl('1');
        $character->setSkillPoints(10);
        $character->$this->armorEquipment->PutOnByName('pants');
        $character->$this->weaponEquipment->PutOnByName('pantaloons');
        $this->userRepository->setCharacter($character);
        
    }
}

//$characterBuilder = $this->CharacterBuilder->create();