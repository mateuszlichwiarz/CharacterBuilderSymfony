<?php

namespace App\Service\Character;

use App\Logic\Character\CharacterManager;
use App\Entity\Weapon;
use App\Entity\Armor;

class CharacterEquipment extends CharacterManager
{
    private Armor $armor;
    private Weapon $weapon;

    public function __construct($user)
    {
        $this->loadCharacter($user);
        $this->loadArmor();
        $this->loadWeapon();
    }

    private function loadArmor()
    {
        $character = $this->character;
        $armor = $character->getArmor();

        $this->armor = $armor;
    }

    private function loadWeapon()
    {
        $character = $this->character;
        $weapon = $character->getWeapon();

        $this->weapon = $weapon;
    }

    public function getArmorName()
    {
        $armor = $this->armor;
        $name = $armor->getName();

        return $name;
    }

    
}