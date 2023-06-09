<?php declare(strict_types=1);

namespace App\tests\Service\Character\Attribute\SkillPoints;

use PHPUnit\Framework\TestCase;
use App\Service\Character\Attribute\SkillPoints\SkillPointsAvailable;
use App\Entity\Character;

final class SkillPointsAvailableTest extends TestCase
{
    public function testCheckAvailableIsTrue(): void
    {
        $character = new Character();
        $character->setSkillPoints(10);

        $available = new SkillPointsAvailable();
        $result = $available->isAvailable($character);

        $this->assertTrue($result);
    }

    public function testCheckAvailableIsFalse(): void
    {
        $character = new Character();
        $character->setSkillPoints(0);

        $available = new SkillPointsAvailable();
        $result = $available->isAvailable($character);

        $this->assertFalse($result);
    }

    public function testCheckAvailableIsFalseNegativeValue(): void
    {
        $character = new Character();
        $character->setSkillPoints(-10);

        $available = new SkillPointsAvailable();
        $result = $available->isAvailable($character);

        $this->assertFalse($result);
    }

}