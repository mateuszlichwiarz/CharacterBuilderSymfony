<?php

namespace App\Service\Character;

use App\Service\Character\CharacterBuilder;

class CharacterInterface
{
    protected $userId;

    public function __construct(private CharacterBuilder $characterBuilder, private CharacterUpdater $characterUpdater)
    {}

    public function create($object)
    {
        return $this->CharacterBuilder->init($object);
    }

    public function get($key)
    {
        return $this->CharacterUpdater->set($key);
    }

    public function update($method)
    {
        $this->CharacterUpdater();
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

$character->setName('chuj');
$character->setStrength(5);

$this->CharacterService->create($character);

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


