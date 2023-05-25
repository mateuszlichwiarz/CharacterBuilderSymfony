<?php

namespace App\Service\Equipment\Weapon\Factory;

use App\Service\Abstract\AbstractFactory;
use App\Repository\WeaponRepository;

class WeaponFactory extends AbstractFactory
{
    public function __construct( private WeaponRepository $weaponRepository ){}

    public function create(object $weapon): void
    {

    }
}