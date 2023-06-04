<?php declare(strict_types=1);

namespace App\Service\Character;

use App\Repository\CharacterRepository;
use App\Repository\UserRepository;

use App\Entity\User;
use App\Service\Character\Factory\CharacterBuilderFactory;
use Symfony\Bundle\SecurityBundle\Security;


class CharacterManager
{
    public function __construct(
        private CharacterRepository $characterRepository,
        private UserRepository $userRepository,
        private Security $security,
        private CharacterBuilderFactory $characterBuilderFactory
    ){}

    public function getCharacter(): object|null
    {
        $character = $this->getUserCharacterId();
        return $character;
    }

    private function getUserCharacterId()
    {
        /** @var User $user */
        $user = $this->security->getUser();
        return $user->getPlayerCharacter();
    }

    private function getUserId()
    {
        /** @var User $user */
        $user = $this->security->getUser();
        return $user->getId();
    }
}