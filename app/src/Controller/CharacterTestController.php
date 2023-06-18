<?php declare(strict_types = 1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Character\Attribute\Comparator;

use App\Service\Character\CharacterManager;
use App\Service\Character\Factory\CharacterBuilderFactory;

use App\Form\Character\CreateCharacterFormType;

use App\Entity\Character;
use App\Repository\CharacterRepository;
use App\Service\Character\Attribute\SkillPointComparator;
use App\Service\Character\Attribute\AttributeComparator;
use App\Service\Character\Attribute\AttributeUpdateValidator;
use App\Service\Character\Attribute\RequestAttributes;
use App\Service\Character\Attribute\SkillPoints\SkillPointsAvailable;
use App\Service\Character\Attribute\SkillPoints\SkillPointsDiff;
use App\Service\Character\Attribute\Strength\StrengthDiff;
use App\Service\Character\Attribute\Strength\StrengthValidator;

use App\Service\Character\Attribute\Updater\CharacterAttributeUpdater;
use App\Service\Character\CharacterCreator;

class CharacterTestController extends AbstractController
{
    public function __construct(
        private CharacterRepository $characterRepository,
        private CharacterManager $characterManager,
        private CharacterCreator $characterCreator,
    ){}

    #[Route("/character", name: 'character_show')]
    public function show(Request $request): Response
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
    
    #[Route("/character/create", name: 'character_create')]
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

    #[Route('/character/update', name: 'character_attribute_update')]
    public function update(
        Request $request,
        StrengthDiff $strengthDiff,
        SkillPointsDiff $skillPointsDiff,
        AttributeUpdateValidator $attrUpdValidator,
        CharacterAttributeUpdater $characterAttributeUpdater,
        ): Response
    {   
        $character = $this->characterManager->getUserCharacter();
        $attributes = new RequestAttributes($request);

        if($attrUpdValidator->isValid($character, $attributes))
        {
            $characterAttributeUpdater->update($character, $attributes);
        }
        
        /*
        if($attrUpdValidator->isValid($character) == true) {

            $diffStrength = $strengthDiff->getDiff($character, $requestStrength);
            $freePoints = $skillPointsDiff->getDiff($character, $diffStrength);
            if($freePoints >= 0) {
                $character->setStr($requestStrength);
                $character->setSkillPoints($freePoints);
                $this->characterRepository->save($character, true);
            }
        }
        */
        return $this->redirectToRoute('character_show');
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