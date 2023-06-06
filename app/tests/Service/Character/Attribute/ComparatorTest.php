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

    public function testExceptionMessageHigherThanExpectedWithoutType(): void
    {
        $repositoryAttribute = 1;
        $requestAttribute    = 2;

        $comparator = new Comparator($repositoryAttribute, $requestAttribute);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Attributes value is higher than it should be');

        $result = $comparator->compareAttribute();
    }

    public function testExceptionMessageHigherThanExpectedWithType(): void
    {
        $repositoryAttribute = 1;
        $requestAttribute    = 2;

        $comparator = new Comparator($repositoryAttribute, $requestAttribute, 'strength');

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Strength value is higher than it should be');

        $result = $comparator->compareAttribute();
    }
}