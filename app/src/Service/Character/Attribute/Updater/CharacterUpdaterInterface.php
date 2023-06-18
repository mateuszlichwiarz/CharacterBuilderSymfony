<?php declare(strict_types=1);

namespace App\Service\Character\Attribute\Updater;

use App\Entity\Character;
use App\Service\Character\Attribute\RequestAttributes;

interface CharacterUpdaterInterface
{
    public function update(Character $character, RequestAttributes $attributes): void;
}