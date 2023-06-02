<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Character;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\ArmorRepository;
use App\Repository\WeaponRepository;
use App\Repository\CharacterRepository;

use App\Service\Character\Factory\CharacterBuilderFactory;

class ExampleController extends AbstractController
{
    public function __construct(
        private CharacterBuilderFactory $characterBuilderFactory,
    ){}

    #[Route('/foo/bar')]
    public function index(): Response
    {

        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $character = $user->getPlayerCharacter();
        if(is_null($character))
        {
            //$character = new Character();
            //$character->setName('foo_bar')->setStr(10);
            $character = $this->characterBuilderFactory->createCharacter(1, 1, 10);

            return new Response('foo bar: saved '());
        }else
        {
            return new Response('foo bar '.$character->getName());
        }
    }
}