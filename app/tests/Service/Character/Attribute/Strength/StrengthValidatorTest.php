<?php declare(strict_types=1);

namespace App\tests\Service\Character\Attribute\Strength;

use PHPUnit\Framework\TestCase;
use App\Service\Character\Attribute\Strength\StrengthValidator;
use App\Entity\Character;

final class StrengthValidatorTest extends TestCase
{
    public function testGetValidIsGreaterThan(): void
    {
        $character = new Character();
        $character->setStr(10);
        $inputValue = intval('15');

        $strValidator = new StrengthValidator();
        $result = $strValidator->getValid($character, $inputValue); 

        $this->assertTrue($result);
    }

    public function testGetValidIsLessThan(): void
    {
        $character = new Character();
        $character->setStr(10);
        $inputValue = intval('5');

        $strValidator = new StrengthValidator();
        $result = $strValidator->getValid($character, $inputValue); 

        $this->assertFalse($result);
    }    
}