<?php declare(strict_types=1);

namespace App\tests\Service\Character\Attribute;

use App\Service\Character\Attribute\Comparator;
use PHPUnit\Framework\TestCase;

final class ComparatorTest extends TestCase
{
    public function testTrueResult(): void
    {
        $repositoryStrength = 2;
        $requestStrength    = 1;

        $comparator = new Comparator($repositoryStrength, $requestStrength);
        $result = $comparator->compareAttribute();

        $this->assertSame($result, true);
    }

    public function testExceptionMessageFirstCompare(): void
    {
        $repositoryStrength = 1;
        $requestStrength    = 1;

        $comparator = new Comparator($repositoryStrength, $requestStrength);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Nothing to change');

        $comparator->compareAttribute();
    }
}