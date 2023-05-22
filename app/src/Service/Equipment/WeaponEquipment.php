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
        ){}
    
    //do poprawy updateWeapon, absolutnie niepotrzebne name or id jeśli wcześniej to fetchujemy
    public function putOnByName(string $name): object
    {
        $weapon = $this->findEquipmentByName($name, $this->weaponRepository);
        $weaponId = $weapon->getId();
        //$this->characterRepository->updateWeaponById($weaponId);
        return $weapon;
    }
    
    public function putOnById(int $id): object
    {
        $weapon = $this->findEquipmentById($id, $this->weaponRepository);
        //$this->characterRepository->updateWeaponById($weaponId);
        return $weapon;
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