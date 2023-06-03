<?php declare(strict_types=1);

namespace App\Service\Character;

use App\Repository\CharacterRepository;
use App\Repository\UserRepository;

use App\Entity\User;

use Symfony\Bundle\SecurityBundle\Security;


class CharacterManager
{
    public function __construct(
        private CharacterRepository $characterRepository,
        private UserRepository $userRepository,
        private Security $security,
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
}