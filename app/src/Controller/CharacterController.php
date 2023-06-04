<?php declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Character\CharacterManager;
use App\Service\Character\Factory\CharacterBuilderFactory;

use App\Form\Character\CreateCharacterFormType;

use App\Entity\Character;
use App\Repository\CharacterRepository;

class CharacterController extends AbstractController
{
    public function __construct(
        private CharacterBuilderFactory $characterBuilderFactory,
        private CharacterRepository $characterRepository,
        private CharacterManager $characterManager,
    ){}

    #[Route("/character", name: 'character_show')]
    public function show(Request $request): Response
    {
        $character = $this->characterManager->getCharacter();
        if(is_null($character)) {
            return $this->render('character/index.html.twig');
        }else {
            return $this->render('character/character.html.twig',[
                'character' => $character,
            ]);
        }
    }
    
    #[Route("/character/create", name: 'character_create')]
    public function create(Request $request): Response
    {
        $character = new Character();

        $form = $this->createForm(CreateCharacterFormType::class, $character);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
                $character = $form->getData();
                $this->characterManager->createCharacter($character);
                
            return $this->redirectToRoute('character_show');
        }

        return $this->render('character/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/character/update', name: 'character_update')]
    public function update(Request $request): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $character = $user->getPlayerCharacter();
        $spDatabase = $character->getSkillPoints();
        $strPost = $request->request->get('str');
        $spPost  = $request->request->get('sp');
        if(($spDatabase < $spPost) || ($spDatabase == $spPost) || $spDatabase == 0) {
            //error message osobno
            //swietny pomysl do checkowania danych
            return new Response("don't do that");
        }else
        {
            $character
                ->setStr($strPost)
                ->setSkillPoints($spPost);
            $this->characterRepository->save($character, true);

            return $this->redirectToRoute('character_show');
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