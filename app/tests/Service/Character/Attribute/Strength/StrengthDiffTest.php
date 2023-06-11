<?php declare(strict_types=1);

namespace App\tests\Service\Character\Attribute\Strength;

use PHPUnit\Framework\TestCase;
use App\Service\Character\Attribute\Strength\StrengthDiff;
use App\Entity\Character;

final class StrengthDiffTest extends TestCase
{
    public function testDiffResultZero(): void
    {
        $character = new Character();
        $character->setStr(10);
        $inputValue = intval('10');

        $strDiff = new StrengthDiff();
        $result = $strDiff->getDiff($character, $inputValue);

        $this->assertEquals($result, 0);
    }

    public function testDiffResultPositiveValue(): void
    {
        $character = new Character();
        $character->setStr(10);
        $inputValue = intval('15');

        $strDiff = new StrengthDiff();
        $result = $strDiff->getDiff($character, $inputValue);

        $this->assertEquals($result, 5);
    }
}