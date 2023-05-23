<?php

namespace App\Service\Factory;

use App\Repository\CharacterRepository;

use App\Service\Equipment\ArmorEquipment;
use App\Service\Equipment\WeaponEquipment;

use App\Service\Factory\AbstractFactory;

class CharacterFactory extends AbstractFactory
{
    public function __construct(
        private CharacterRepository $characterRepository,
        private ArmorEquipment $armorEquipment,
        private WeaponEquipment $weaponEquipment,
        )
    {
    }

    public function create($character): void
    {
        $character
            ->setExp('1')
            ->setLvl('1')
            ->setSkillPoints(10)
            ->setArmor($this->armorEquipment->PutOnByName('pantaloons'))
            ->setWeapon($this->weaponEquipment->PutOnByName('fists'));

        $this->characterRepository->save($character, true);
    }

    /*
    static public function idGenerator(): int
    {
        $id = rand(1, 1000000);
        
        return $id;
    }
    */
}