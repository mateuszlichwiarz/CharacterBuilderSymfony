<?php

declare(strict_types=1);

namespace App\tests\Service\Equipment;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


use App\Service\Equipment\WeaponEquipment;

class WeaponEquipmentTest extends KernelTestCase
{
    public function testFindMethodById(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $weaponEquipment = $container->get(WeaponEquipment::class);

        $weaponId = $weaponEquipment->getWeaponById(2);
        $this->assertSame('fists', $weaponId);
    }

    public function testFindMethodByName(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $weaponEquipment = $container->get(WeaponEquipment::class);

        $weaponName = $weaponEquipment->getWeaponByName('fists');
        $this->assertSame(2, $weaponName);
    }
}