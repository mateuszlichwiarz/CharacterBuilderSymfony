<?php

namespace App\Service\Equipment;


use App\Repository\CharacterRepository;
use App\Repository\WeaponRepository;

use App\Service\Equipment\AbstractEquipment;


class WeaponEquipment extends AbstractEquipment
{
    public function __construct(
        private WeaponRepository $weaponRepository,
        private CharacterRepository $characterRepository
        )
    {}

    public function putOnByName($name)
    {
        $armor = $this->findEquipmentById($name, $this->weaponRepository);
        $armorId = $armor->getId();

        $this->characterRepository->update($armorId, 'armor');

    }
    
    public function putOnById($id)
    {
        $weapon = $this->findEquipmentById($id, $this->weaponRepository);
        $weaponId = $weapon->getId();
        $this->characterRepository->updateCharacter($weaponId, 'weapon');
    }

    public function getWeaponById(int $id): string
    {
        $weapon = $this->findEquipmentById($id, $this->weaponRepository);
        
        return $weapon->getName();
    }

    public function getWeaponByName(string $name): int
    {
        $weapon = $this->findEquipmentByName($name, $this->weaponRepository);
        
        return $weapon->getId();
    }
}