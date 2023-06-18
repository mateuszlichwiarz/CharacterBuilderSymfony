<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\SecurityBundle\Security;

use App\Service\Character\Attribute\Lvl\LvlUp;
use App\Service\Character\CharacterManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LevelUpController extends AbstractController
{
    public function __construct(
        private LvlUp $lvlUp,
        private Security $security,
        private CharacterManager $characterManager,
    ){}

    #[Route('/character/level_up', name: 'level_up')]
    public function newLevelAction(): Response
    {
        $character = $this->characterManager->getUserCharacter();
        $character->changeExp(3003);
        $this->lvlUp->execute($character);

        return new Response('Level Up.');
    }
}