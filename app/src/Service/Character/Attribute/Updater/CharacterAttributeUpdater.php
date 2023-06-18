<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Updater;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use App\Service\Character\Attribute\RequestAttributes;
use App\Service\Character\Attribute\SkillPointsCalculator;

use App\Service\Character\Attribute\Updater\CharacterUpdaterInterface;

class CharacterAttributeUpdater implements CharacterUpdaterInterface
{
    public function __construct(
        private CharacterRepository $characterRepository,
        private SkillPointsCalculator $skillPointsCalculator,
    )
    {}

    public function update(Character $character, RequestAttributes $attributes): void
    {
        $character
            ->changeSkillPoints($this->skillPointsCalculator->calculate($character, $attributes))
            ->changeStr($attributes->getStr())
            ->changeDex($attributes->getDex())
            ->changeWis($attributes->getWis())
            ;
        $this->characterRepository->save($character, true);
    }
}