<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

use App\Service\Character\Attribute\AttributeValidatorInterface;
use App\Service\Character\Attribute\Tools\AttributeDiffReturner;

class AttributeValidator implements AttributeValidatorInterface
{
    public function __construct(private AttributeDiff $attributeDiff)
    {}

    public function validate(
        int $skillPoint,
        int $attributeRequest,
        int $attributeRepository,
        
    ): \Exception|ValidateObject
    {
        if($skillPoint <= 0){

            throw new \Exception("You don't have any skill point ");

        }elseif($skillPoint > 0) {
            
            if($attributeRequest > $attributeRepository)
            {
                $diff = $this->attributeDiff->getDiff($attributeRequest, $attributeRepository);
                return new ValidateObject('diff' => $diff, 'type' => '0');
            }elseif($attributeRequest < $attributeRepository)
            {
                $diff = $this->attributeDiff->getDiff($attributeRepository, $attributeRequest);
                return new ValidateObject($diff, );
            }

        }
    }

    
    private function diff(int $attributeRequest,int $attributeRepository): int
    {
        return $attributeRequest -= $attributeRepository;
    }
}