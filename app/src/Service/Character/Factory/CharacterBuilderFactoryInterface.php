<?php declare(strict_types=1);

namespace App\Service\Character\Factory;

use App\Service\Character\Builder\CharacterBuilder;
use App\Entity\Character;

interface CharacterBuilderFactoryInterface
{
    public function createBuilder(): CharacterBuilder;
}