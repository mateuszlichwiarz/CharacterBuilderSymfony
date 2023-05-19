<?php

namespace App\Service\Factory;

use App\Service\Factory\CharacterFactory;
use App\Service\Factory\CharacterUpdater;

class CharacterService
{
    protected $userId;

    public function __construct(
        private CharacterFactory $characterFactory,
        private CharacterUpdater $characterUpdater
        )
    {}

    public function create($object)
    {
        //return $this->characterBuilder->create($object);
    }

    public function get($key)
    {
        //return $this->CharacterUpdater->set($key);
    }

    public function update($method)
    {
        //$this->CharacterUpdater();
    }

    public function delete()
    {
        //$this->CharacterBuilder->delete();
    }

    public function userId($id)
    {
        //findUser
    }
}

/*
$character->setName('chuj');
$character->setStrength(5);

$this->CharacterService->create($character);
$str = new Strength(4);
$
$this->CharacterFactory->create($character);

$characterEquipment = $this->CharacterService->userId($id)->get('equipment');
$characterWeapon    = $this->CharacterService->userId($id)->get('weapon');

$weaponName = $characterWeapon->getName();
$weaponId   = $characterWeapon->getId();
$weaponDmg  = $characterWeapon->getDmg();

//$characterWeapon    = $this->CharacterInterface->get(Weapon::get());
//$characterName      = $this->CharacterInterface->get(Name::get());
//$character          = $this->CharacterInterface->get(::get());

$this->CharacterService->userId($id)->update(Weapon::byId($weaponId));
$this->CharacterService->userId($id)->update(Armor::byName($armorName));
$this->CharacterService->userId($id)->update(Name::set($name));

$this->CharacterUpdater->userId($id)->update(Dexterity::increaseValue(5));
$this->CharacterService->update(Strength::decreaseValue(3));
$this->CharacterService->update(Inteligency::decreaseValue(2));

$this->Update->userId($id)->Dexterity(5);
$this->Get->userId($id)->all();

$this->CharacterInterface->delete();

$this->CharacterBuilder::setUserId($id)->create($object);

$this->CharacterBuilder::setUserId($id)->update();

*/