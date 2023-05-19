<?php

namespace App\tests\Service\Equipment;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Service\Equipment\WeaponEquipment;

class WeaponEquipmentTest extends KernelTestCase
{
    public function testFindWeaponMethodById(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $weaponEquipment = $container->get(WeaponEquipment::class);

        $weaponId = $weaponEquipment->getWeaponById(2);
        $this->assertSame('fists', $weaponId);
    }

    public function testFindWeaponMethodByName(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $weaponEquipment = $container->get(WeaponEquipment::class);

        $weaponName = $weaponEquipment->getWeaponByName('fists');
        $this->assertSame(2, $weaponName);
    }
}