<?php

namespace App\Service\Equipment;

trait FinderTrait
{
    private function findEquipmentById($id, $repository)
    {
        $object = $repository->findById($id);
        if($object === null)
        {
            throw new \Exception(sprintf('doesnt exist'));
        }else
        {
            return $object;
        }
    }
}