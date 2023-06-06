<?php declare(strict_types=1);

namespace App\Service\Character\Attribute;

class Comparator
{
    public function __construct(
        private int $repositoryValue,
        private int $requestValue,
        private string|null $attributeType = null,
        ){}

    public function compareAttribute(): \Exception|bool
    {
        $repositoryValue = $this->repositoryValue;
        $requestValue    = $this->requestValue;
        $attributeType   = $this->attributeType;

        if($requestValue == $repositoryValue) {

            throw new \Exception('Nothing to change');

        }elseif($repositoryValue == 0) {

            throw new \Exception('No skill point available');

        }elseif($requestValue > $repositoryValue) {
            
            if(is_null($attributeType)) {
                throw new \Exception('Attributes value is higher than it should be');
            }else {
                throw new \Exception(ucfirst($attributeType).' value is higher than it should be');
            }

        }elseif($requestValue < $repositoryValue
                && ($requestValue > 0)
                && ($requestValue !== 0)) {
            
            return true;

        }else {

            throw new \Exception('Unknown error');

        }

    }

}