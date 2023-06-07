<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

interface AttributeValidatorInterface
{
    public function validate(int $freePoints, int $attributeRequest, int $attributeRepository): \Exception|bool;
}