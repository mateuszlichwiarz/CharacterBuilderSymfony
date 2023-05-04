<?php

namespace App\Logic\Equipment;


use App\Service\Equipment\AbstractEquipment;
use App\Repository\ArmorRepository;


class Armor extends AbstractEquipment
{
    private ArmorRepository $armorRepository;
    private CharacterRepository $characterRepository;
    
    public function __construct(ArmorRepository $armorRepository, CharacterRepository $characterRepository)
    {
        $this->armorRepository = $armorRepository;
        $this->characterRepository = $characterRepository;
    }

    private function findEquipmentById()
    {
        $armor = $this->armorRepository->findArmorById($id);
        if($armor === null)
        {
            throw new \Exception(sprintf('Armor with this id doesnt exist'));
        }else
        {
            return $armor;
        }
    }

    public function putOnCharacterByName($name)
    {
        $armor = $this->findEquipmentById($name);
        $armorId = $armor->getId(); //na czuja
        $this->characterRepository->updateCharacter($armorId, 'armor');
    }

    public function putOnCharacterById($id)
    {
        $armor = $this->findEquipmentById($id);
        $armorId = $armor->getId(); //na czuja
        $this->characterRepository->updateCharacter($armorId, 'armor');
    }

    public function putOnByName($name)
    {
        $armor = $this->armorRepository->findArmorByName($name);   
    }
    
}