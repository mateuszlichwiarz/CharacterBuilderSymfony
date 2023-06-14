<?php declare(strict_types=1);

namespace App\tests\Service\Character\Attribute;

use PHPUnit\Framework\TestCase;
use App\Service\Character\Attribute\SkillPoints\SkillPointsAvailable;
use App\Service\Character\Attribute\AttributeUpdateValidator;
use App\Entity\Character;

final class AttributeUpdateValidatorTest extends TestCase
{

    public function testReturnTrue(): void
    {
        $available = new SkillPointsAvailable();
        $character = new Character();
        $character
            ->setSkillPoints(10)
            ->setStr(10)
            ->setDex(10)
            ->setWis(10)
        ;
        $str = intval('15');
        $dex = intval('10');
        $wis = intval('10');
        $validator = new AttributeUpdateValidator($available);
        $validator
            ->addAttribute($str)
            ->addAttribute($wis)
            ->addAttribute($dex)
        ;
        $result = $validator->isValid($character);
        $this->assertTrue($result);
    }

}