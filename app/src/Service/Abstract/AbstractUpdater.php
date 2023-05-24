<?php

namespace App\Service\Abstract;

abstract class AbstractUpdater
{   abstract public function update(object $object): void;  }