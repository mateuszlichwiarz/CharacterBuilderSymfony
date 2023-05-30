<?php declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\Character\CreateCharacterFormType;
use App\Service\Character\Factory\CharacterFactory;

use App\Entity\User;
use App\Entity\Character;

use App\Repository\UserRepository;
use App\Repository\CharacterRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class CharacterController extends AbstractController
{
    public function __construct(
        private CharacterFactory $characterFactory,
        private CharacterRepository $characterRepository,
        private UserRepository $userRepository,
    ){}

    #[Route("/character", name: 'character_index')]
    public function index(Request $request): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $character = $user->getPlayerCharacter();
        if(is_null($character))
        {
            return $this->render('character/index.html.twig');
        }else
        {
            $character = $user->getPlayerCharacter();

            return $this->render('character/character.html.twig',[
                'character' => $character,
            ]);
        }
    }

    
    #[Route("/character/creator", name: 'character_creator')]
    public function create(Request $request): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $character = new Character();

        $form = $this->createForm(CreateCharacterFormType::class, $character);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
                $character = $form->getData();

                $character = $this->characterFactory->createCharacter(1, 1, 10);
                $this->characterRepository->save($character);

                $user->setPlayerCharacter($character);
                $this->userRepository->save($user, true);
                
                return $this->redirectToRoute('character_index');
        }

        return $this->render('character/create.html.twig', [
            'form' => $form->createView()
        ]);

        return new JsonResponse([
            'character' => $character
            ] ,200);
    }

    #[Route('/character/update_stats', name: 'character_update_stats')]
    public function updateStats(Request $request): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $character = $user->getPlayerCharacter();
        $spDatabase = $character->getSkillPoints();
        $strPost = $request->request->get('str');
        $spPost  = $request->request->get('sp');
        if(($spDatabase < $spPost) || ($spDatabase == $spPost) || $spDatabase == 0)
        {
            //error message osobno
            //swietny pomysl do checkowania danych
            return new Response("don't do that");
        }else
        {
            $character
                ->setStr($strPost)
                ->setSkillPoints($spPost);
            $this->characterRepository->save($character, true);

            return $this->redirectToRoute('character_index');
        }
    }

    #[Route('/character/inventory', name: 'character_inventory')]
    public function inventory(): Response
    {
        /*
        $characterControl = new CharacterControl($entityManager);
        
        $characterControl->update();
        if($controlCharacter)
        {
            $inventory = $controlCharacter->getInventory();
            $character = $controlCharacter->getCharacter();
        }else
        {
            return $this->render('foo/bar.html.twig');
        }

        return $this->render('character/character.html.twig', [
            'inventory' => $inventory,
        ]);
        */
        return new Response('Inventory');
    }
}