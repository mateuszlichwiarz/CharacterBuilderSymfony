<?php

namespace App\Service\Equipment;


use App\Service\Equipment\AbstractEquipment;
use App\Repository\WeaponRepository;


class WeaponEquipment extends AbstractEquipment
{
    private WeaponRepository $weaponRepository;
    public function __construct(WeaponRepository $weaponRepository)
    {
        $this->weaponRepository = $weaponRepository;
    }

    private function isExist($name)
    {
        $weapon = $this->weaponRepository->findWeaponById($id);
    }

    public function putOnByName($name)
    {
        $weapon = $this->weaponRepository->findWeaponById($id);
        if($weapon !== null)
        {
            
        }else
        {

        }

    }
    
    public function putOnById($id)
    {
        $weapon = $this->weaponRepository->findWeaponByName($name);
    }
}