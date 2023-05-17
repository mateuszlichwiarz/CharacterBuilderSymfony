<?php

namespace App\Service\Equipment;

abstract class AbstractEquipment
{
    abstract public function putOnById($id);
    abstract public function putOnByName($name);

    public function findEquipmentById(int $id, $repository): object
    {
        $object = $repository->findById($id);
        if($object === null)
        {
            throw new \Exception(sprintf('not exist'));
        }else
        {
            return $object;
        }
    }

    public function findEquipmentByName(string $name, $repository): object
    {
        $object = $repository->findByName($name);
        if($object === null)
        {
            throw new \Exception(sprintf('not exist'));
        }else
        {
            return $object;
        }
    }
}