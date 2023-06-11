<?php declare(strict_types=1);

namespace App\tests\Service\Character\Attribute\Strength;

use PHPUnit\Framework\TestCase;
use App\Service\Character\Attribute\SkillPoints\SkillPointsDiff;
use App\Entity\Character;

final class SkillPointsDiffTest extends TestCase
{
    public function testDiffResultZeroValue(): void
    {
        $character = new Character();
        $character->setSkillPoints(10);
        $inputValue = 10;

        $spDiff = new SkillPointsDiff();
        $result = $spDiff->getDiff($character, $inputValue);

        $this->assertEquals($result, 0);
    }

    public function testDiffResultPositiveValue(): void
    {
        $character = new Character();
        $character->setSkillPoints(10);
        $inputValue = 3;

        $spDiff = new SkillPointsDiff();
        $result = $spDiff->getDiff($character, $inputValue);

        $this->assertEquals($result, 7);
    }

    public function testDiffResultNegativeValue(): void
    {
        $character = new Character();
        $character->setSkillPoints(0);
        $inputValue = 3;

        $spDiff = new SkillPointsDiff();
        $result = $spDiff->getDiff($character, $inputValue);

        $this->assertEquals($result, -3);
    }
}