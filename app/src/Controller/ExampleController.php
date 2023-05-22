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

use App\Service\Factory\CharacterFactory;

class ExampleController extends AbstractController
{
    public function __construct(
        private CharacterFactory $characterFactory,
        //private CharacterRepository $characterRepository
    ){}

    #[Route('/foo/bar')]
    public function index(): Response
    {

        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $character = $user->getPlayerCharacter();
        if(is_null($character))
        {
            $character = new Character();
            $character->setName('foo_bar')->setStr(10);
            $this->characterFactory->create($character);

            return new Response('foo bar: saved '.$character->getId());
        }else
        {
            return new Response('foo bar '.$user->getEmail());
        }
    }
}