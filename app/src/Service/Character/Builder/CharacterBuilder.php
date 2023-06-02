<?php declare(strict_types=1);

namespace App\Service\Character\Builder;

use App\Entity\Character;
use App\Entity\Armor;
use App\Entity\Weapon;
use App\Repository\ArmorRepository;
use App\Repository\WeaponRepository;
use Psr\Log\LoggerInterface;

class CharacterBuilder
{
    public function __construct(
        private LoggerInterface $logger,
        private ArmorRepository $armorRepository,
        private WeaponRepository $weaponRepository,
        ){}

    public function buildCharacter(): Character
    {
        $this->logger->info('creating a character.');
        
        $character = new Character();
        $character
            ->setName('warrior')
            ->setLvl(1)
            ->setExp(1)
            ->setStr(10)
            ->setSkillPoints(10)
            ->setArmor($this->equipArmor(1))
            ->setWeapon($this->equipWeapon(1));
        return $character;
    }

    private function equipArmor(int $id): Armor
    {
        $armor = $this->armorRepository->findById($id);
        return $armor;
    }

    private function equipWeapon(int $id): Weapon
    {
        $weapon = $this->weaponRepository->findById($id);
        return $weapon;
    }
}