<?php

namespace App\Service\Equipment;


use App\Service\Equipment\AbstractEquipment;
use App\Repository\ArmorRepository;
use App\Repository\CharacterRepository;


class ArmorEquipment extends AbstractEquipment
{

    public function __construct(
        private ArmorRepository $armorRepository,
        private CharacterRepository $characterRepository
        ){}

    public function putOnByName(string $name): object
    {
        $armor = $this->findEquipmentByName($name, $this->armorRepository);
        $armorId = $armor->getId();
        //$this->characterRepository->updateArmorByName($armorId);
        return $armor;
    }

    public function putOnById(int $id): object
    {
        $armor = $this->findEquipmentById($id, $this->armorRepository);
        $armorId = $armor->getId();
        //$this->characterRepository->updateArmorById($armorName);
        return $armor;
    }

    public function getArmorById(int $id): string
    {
        $weapon = $this->findEquipmentById($id, $this->armorRepository);
        
        return $weapon->getName();
    }

    public function getArmorByName(string $name): int
    {
        $weapon = $this->findEquipmentByName($name, $this->armorRepository);
        
        return $weapon->getId();
    }
}