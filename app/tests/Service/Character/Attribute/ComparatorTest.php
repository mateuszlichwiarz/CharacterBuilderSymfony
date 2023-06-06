<?php declare(strict_types=1);

namespace App\tests\Service\Character\Attribute;

use App\Service\Character\Attribute\Comparator;
use PHPUnit\Framework\TestCase;

final class ComparatorTest extends TestCase
{
    public function testReturnTrueResult(): void
    {
        $repositoryAttribute = 2;
        $requestAttribute    = 1;

        $comparator = new Comparator($repositoryAttribute, $requestAttribute);
        $result = $comparator->compareAttribute();

        $this->assertSame($result, true);
    }

    public function testExceptionMessageEqualsArguments(): void
    {
        $repositoryAttribute = 1;
        $requestAttribute    = 1;

        $comparator = new Comparator($repositoryAttribute, $requestAttribute);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Nothing to change');

        $result = $comparator->compareAttribute();
    }
}