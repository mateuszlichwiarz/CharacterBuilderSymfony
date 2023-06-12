<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Interface;

use App\Entity\Character;

interface AttributeAvailableInterface
{
    public function isAvailable(Character $character): bool;
}