<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\SkillPoints;

use App\Entity\Character;

interface AttributeAvailableInterface
{
    public function checkAvailable(Character $character): bool;
}