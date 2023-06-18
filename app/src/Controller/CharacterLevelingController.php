<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\SecurityBundle\Security;

use App\Service\Character\Attribute\Lvl\CharacterLeveling;
use App\Service\Character\CharacterManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CharacterLevelingController extends AbstractController
{
    public function __construct(
        private CharacterLeveling $characterLeveling,
        private Security $security,
        private CharacterManager $characterManager,
    ){}

    #[Route('/character/level_up', name: 'level_up')]
    public function levelUpAction(): Response
    {
        $character = $this->characterManager->getUserCharacter();
        $this->characterLeveling->levelUp($character);

        return $this->redirectToRoute('character_show');
    }
}