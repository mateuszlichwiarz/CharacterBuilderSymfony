<?php

namespace App\Service\Equipment;

abstract class AbstractEquipment
{
    abstract public function putOnById(int $id): object;
    abstract public function putOnByName(string $name): object;

    public function findEquipmentById(int $id, object $repository): object
    {
        $object = $repository->findById($id);
        return $object ?? throw new \Exception(sprintf('not exist'));
    }

    public function findEquipmentByName(string $name, object $repository): object
    {
        $object = $repository->findByName($name);
        return $object ?? throw new \Exception(sprintf('not exist'));
    }
}