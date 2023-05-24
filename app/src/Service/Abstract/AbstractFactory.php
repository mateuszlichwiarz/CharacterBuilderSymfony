<?php

namespace App\Service\Abstract;

abstract class AbstractFactory
{   abstract public function create(object $object): void;  }