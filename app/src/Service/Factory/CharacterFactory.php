<?php

namespace App\Service\Factory;

use Symfony\Bundle\SecurityBundle\Security;

use App\Repository\UserRepository;

use App\Service\Equipment\ArmorEquipment;
use App\Service\Equipment\WeaponEquipment;

use App\Service\Factory\AbstractFactory;

class CharacterFactory extends AbstractFactory
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
        $this->armorEquipment->PutOnByName('pantaloons');
        $this->weaponEquipment->PutOnByName('fists');
        $this->userRepository->setCharacter($character);
        
    }
}