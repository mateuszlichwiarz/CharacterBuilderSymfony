<?php

namespace App\tests\Service\Equipment;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Service\Equipment\ArmorEquipment;

class ArmorEquipmentTest extends KernelTestCase
{
    public function testFindArmorMethodById(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $armorEquipment = $container->get(ArmorEquipment::class);

        $armorId = $armorEquipment->getArmorById(1);

        $this->assertSame('pantaloons', $armorId);
    }

    public function testFindArmorMethodByName(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $armorEquipment = $container->get(ArmorEquipment::class);

        $armorName = $armorEquipment->getArmorByName('pantaloons');

        $this->assertSame(1, $armorName);
    }

    //i think mocking will be
    
    public function testPutOnByName(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $armorEquipment = $container->get(ArmorEquipment::class);

        $armorName = $armorEquipment->getArmorByName('pantaloons');

        $this->assertSame(1, $armorName);
    }
}