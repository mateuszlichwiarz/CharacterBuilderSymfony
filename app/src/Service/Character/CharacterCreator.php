<?php declare(strict_types=1);

namespace App\Service\Character;

use App\Service\Character\Builder\CharacterBuilder;
use App\Service\Character\Factory\CharacterBuilderFactory;

use App\Entity\Armor;
use App\Entity\Character;
use App\Entity\Weapon;
use App\Repository\UserRepository;
use App\Repository\ArmorRepository;
use App\Repository\WeaponRepository;

class CharacterCreator
{
    private int $userId;
    private string $name;
    private string $type;

    public function __construct(
        private CharacterBuilderFactory $characterBuilderFactory,
        private UserRepository $userRepository,
        private WeaponRepository $weaponRepository,
        private ArmorRepository $armorRepository,
        )
    {}

    public function createCharacter()
    {
        $character = match(strtolower($this->type)) {
            'warrior' => $this->createCharacterBuilder()
                ->setName($this->name)
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
                ->setName($this->name)
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
                ->setName($this->name)
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
        $this->save($character);
    }


    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    private function createCharacterBuilder(): CharacterBuilder
    {
        return $this->characterBuilderFactory->createBuilder();
    }

    private function save(Character $character)
    {
        $this->userRepository->saveUserCharacter($character, $this->userId);
    }

    private function findWeapon(string $name): Weapon
    {
        $weapon = $this->weaponRepository->findByName($name);
        return $weapon;
    }

    private function findArmor(string $name): Armor
    {
        $armor = $this->armorRepository->findByName($name);
        return $armor;
    }
}