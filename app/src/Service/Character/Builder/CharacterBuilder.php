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
        //private LoggerInterface $logger,
        private ArmorRepository $armorRepository,
        private WeaponRepository $weaponRepository,
        ){}

    public function buildCharacter(object $character): character
    {
        //$this->logger->info('creating a character.');
        
        $character
            ->setLvl(1)
            ->setHp(100)
            ->setExp(1)
            ->setSkillPoints(10)
            ->setStr(10)
            ->setDex(10)
            ->setWis(10)
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