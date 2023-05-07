<?php

namespace App\Service\Equipment;

abstract class AbstractEquipment
{
    abstract public function putOnById($id);
    abstract public function putOnByName($name);
}