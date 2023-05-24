<?php

namespace App\Service\Factory;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Repository\CharacterRepository;

Abstract class AbstractFactory
{   abstract public function create(object $object): void;  }