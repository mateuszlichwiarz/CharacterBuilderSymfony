<?php declare(strict_types=1);

namespace App\Service\Character;

use App\Repository\CharacterRepository;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Entity\Character;

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
    
    public function createCharacter(object $character): void
    {
        $userId = $this->getUserId();
        $character = $this->characterBuilderFactory->createBuilder($character);
        
        $this->saveUserCharacter($character, $userId);
    }

    public function updateCharacterAttributes($request)
    {
        $str = intval($request->request->get('str'));
        $sp  = intval($request->request->get('sp'));
        $requestArray = $request->request->get();

        //$characterAttributes = $this->getUserCharacter()->getAttributes();
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