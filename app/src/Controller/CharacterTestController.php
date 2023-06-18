<?php declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\Character\CreateCharacterFormType;

use App\Service\Character\CharacterManager;
use App\Service\Character\CharacterCreator;

use App\Service\Character\Attribute\AttributeValidator;
use App\Service\Character\Attribute\RequestAttributes;
use App\Service\Character\Attribute\Updater\CharacterAttributeUpdater;
use App\Service\Character\Attribute\Lvl\CharacterLeveling;

use App\Repository\CharacterRepository;


class CharacterTestController extends AbstractController
{
    public function __construct(
        private CharacterRepository $characterRepository,
        private CharacterManager $characterManager,
        private CharacterCreator $characterCreator,
        private CharacterLeveling $characterLeveling,
    ){}

    #[Route("/tests/character", name: 'character_show')]
    public function show(): Response
    {
        $character = $this->characterManager->getUserCharacter();
        if(is_null($character)) {
            return $this->render('character/index.html.twig');
        }else {
            return $this->render('character/character.html.twig',[
                'character' => $character,
            ]);
        }
    }
    
    #[Route("/tests/character/create", name: 'character_create')]
    public function create(Request $request): Response
    {
        $form = $this->createForm(CreateCharacterFormType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();

                $this->characterCreator
                     ->setUserId($this->characterManager->getUserId())
                     ->setName($data['name'])
                     ->setType($data['type'])
                    ->createCharacter()
                    ;
                
            return $this->redirectToRoute('character_show');
        }

        return $this->render('character/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/tests/character/update', name: 'character_attribute_update')]
    public function update(
        Request $request,
        AttributeValidator $attrValidator,
        CharacterAttributeUpdater $characterAttributeUpdater,
        ): Response
    {   
        $character = $this->characterManager->getUserCharacter();
        $attributes = new RequestAttributes($request);

        if($attrValidator->isValid($character, $attributes) === true)
        {
            $characterAttributeUpdater->update($character, $attributes);
            
            return $this->redirectToRoute('character_show');
        }
    }

    #[Route('/tests/character/level_up', name: 'level_up_test')]
    public function levelUpAction(): Response
    {
        $character = $this->characterManager->getUserCharacter();
        $character->changeExp($character->getExpCapThreshold());
        $this->characterRepository->save($character,true);
        $this->characterLeveling->levelUp($character);

        return $this->redirectToRoute('character_show');
    }

    #[Route('/tests/character/inventory', name: 'character_inventory')]
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