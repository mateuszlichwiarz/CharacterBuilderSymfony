<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Interface;

use App\Entity\Character;

interface AttributeValidatorInterface
{
    public function getValid(Character $character, int $inputAttributeValue): bool;
}