<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

use App\Service\Character\Attribute\AttributeValidatorInterface;

class AttributeValidator implements AttributeValidatorInterface
{
    public function validate(
        int $skillPoint,
        int $attributeRequest,
        int $attributeRepository,
    ): \Exception|bool
    {
        if($skillPoint <= 0)
        {
            throw new \Exception("You don't have any skill point ")
        }
    }

    /*
    private function diff(int $attributeRequest,int $attributeRepository): int
    {
        return $attributeRequest -= $attributeRepository;
    }
    */
}