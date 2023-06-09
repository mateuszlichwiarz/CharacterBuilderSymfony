<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

use App\Service\Character\Attribute\AttributeValidatorInterface;
use App\Service\Character\Attribute\Tools\AttributeDiff;

class AttributeValidator implements AttributeValidatorInterface
{
    public array $errors = [];

    public function __construct(private AttributeDiff $attributeDiff)
    {}

    public function validate(
        int $skillPoint,
        int $attributeRequest,
        int $attributeRepository,
        
    ): \Exception|bool
    {
        if($skillPoint <= 0){

            $this->addError("You don't have any skill point");

        }elseif($skillPoint > 0) {
            
            if($attributeRequest > $attributeRepository)
            {
                $diff = $this->attributeDiff->getDiff($attributeRequest, $attributeRepository);
                return true;
            }elseif($attributeRequest < $attributeRepository)
            {
                return false;
            }

        }else{

            $this->addError("Unknown error");
        }
    }

    public function addError(string $message): void
    {
        $this->errors[] = $message;
    }
}