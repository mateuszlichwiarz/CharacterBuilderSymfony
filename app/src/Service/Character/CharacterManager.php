<?php declare(strict_types=1);

namespace App\Service\Character;

use Symfony\Bundle\SecurityBundle\Security;

use App\Repository\CharacterRepository;
use App\Repository\UserRepository;
use App\Repository\ArmorRepository;
use App\Repository\WeaponRepository;

use App\Entity\User;
use App\Entity\Character;
use App\Entity\Weapon;
use App\Entity\Armor;

use App\Service\Character\Builder\CharacterBuilder;
use App\Service\Character\Factory\CharacterBuilderFactory;

use App\Service\Character\Attribute\RequestAttributes;

class CharacterManager
{
    public function __construct(
        private CharacterRepository $characterRepository,
        private ArmorRepository $armorRepository,
        private WeaponRepository $weaponRepository,
        private UserRepository $userRepository,
        private Security $security,
        private CharacterBuilderFactory $characterBuilderFactory
    ){}
    
    public function createCharacter(array $data)
    {
        $userId = $this->getUserId();

        $character = match(strtolower($data['type'])) {
            'warrior' => $this->createCharacterBuilder()
                ->setName($data['name'])
                ->setSkillPoints(10)
                ->setHp(120)
                ->setStr(20)
                ->setDex(15)
                ->setWis(10)
                ->setLvl(1)
                ->setExp(0)
                ->equipArmor($this->findArmor('pantaloons'))
                ->equipWeapon($this->findWeapon('fists'))
                ->buildCharacter(),

            'archer' => $this->createCharacterBuilder()
                ->setName($data['name'])
                ->setSkillPoints(10)
                ->setHp(100)
                ->setStr(15)
                ->setDex(20)
                ->setWis(10)
                ->setLvl(1)
                ->setExp(0)
                ->equipArmor($this->findArmor('pantaloons'))
                ->equipWeapon($this->findWeapon('fists'))
                ->buildCharacter(),

            'mage' => $this->createCharacterBuilder()
                ->setName($data['name'])
                ->setSkillPoints(10)
                ->setHp(80)
                ->setStr(10)
                ->setDex(15)
                ->setWis(20)
                ->setLvl(1)
                ->setExp(0)
                ->equipArmor($this->findArmor('pantaloons'))
                ->equipWeapon($this->findWeapon('fists'))
                ->buildCharacter(),
        };
        $this->saveUserCharacter($character, $userId);
    }
    
    private function findWeapon(string $weaponName): Weapon
    {
        $weapon = $this->weaponRepository->findByName($weaponName);
        return $weapon;
    }

    private function findArmor(string $armorName): Armor
    {
        $armor = $this->armorRepository->findByName($armorName);
        return $armor;
    }

    private function createCharacterBuilder(): CharacterBuilder
    {
        return $this->characterBuilderFactory->createBuilder();
    }

    private function saveUserCharacter($character, $userId): void
    {
        $this->characterRepository->save($character, true);
        $this->userRepository->saveUserCharacter($character, $userId);
    }

        //another save, its for class
    /*
    private function save()
    {
        $this->characterRepository->save($character, true);
        $this->userRepository->saveUserCharacter($character, $userId);
    }
    */

    public function getUserCharacter(): character|null
    {
        /** @var User $user */
        $user = $this->security->getUser();
        return $user->getPlayerCharacter();
    }

    private function getUserId(): int
    {
        /** @var User $user */
        $user = $this->security->getUser();
        return $user->getId();
    }
}