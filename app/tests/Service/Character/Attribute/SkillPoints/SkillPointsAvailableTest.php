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
        $result = $available->checkAvailable($character);

        $this->assertTrue($result);
    }

}