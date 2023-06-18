<?php declare(strict_types=1);

namespace App\Service\Character\Factory;

use App\Service\Character\Factory\CharacterBuilderFactoryInterface;
use App\Service\Character\Builder\CharacterBuilder;

use Psr\Log\LoggerInterface;

class CharacterBuilderFactory implements CharacterBuilderFactoryInterface
{
    public function __construct(
        //private LoggerInterface $logger,
        ){}

    public function createBuilder(): CharacterBuilder
    {
        return new CharacterBuilder();
    }
}