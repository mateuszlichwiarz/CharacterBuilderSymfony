<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Tools;

class AttributeDiff
{
    static public function getDiff(int $firstAttr, int $secondAttr): int { return $firstAttr -= $secondAttr; }
}