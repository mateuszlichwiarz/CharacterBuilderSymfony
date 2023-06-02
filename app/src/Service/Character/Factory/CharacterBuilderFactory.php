<?php declare(strict_types=1);

namespace App\Service\Character\Factory;

use App\Service\Character\Factory\CharacterBuilderFactoryInterface;
use App\Service\Character\Builder\CharacterBuilder;

use App\Repository\ArmorRepository;
use App\Repository\WeaponRepository;

use Psr\Log\LoggerInterface;

class CharacterBuilderFactory implements CharacterBuilderFactoryInterface
{
    public function __construct(private LoggerInterface $logger){}

    public function createBuilder(int $exp,int $lvl,int $skillPoints ): CharacterBuilder
    {
        
        return new CharacterBuilder($this->logger);
    }
}