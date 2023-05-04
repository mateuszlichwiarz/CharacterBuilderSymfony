<?php

namespace App\Logic\Equipment;

abstract class AbstractEquipment
{
    abstract public function ById($id);
    abstract public function ByName($name);
}