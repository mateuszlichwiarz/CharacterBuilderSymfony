<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Interface;

use App\Entity\Character;

interface AttributeDiffInterface
{
    public function getDiff(character $character, int $inputValue): int;
}