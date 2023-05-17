<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\ArmorRepository;
use App\Repository\WeaponRepository;

use App\Service\Factory\CharacterFactory;

class ExampleController extends AbstractController
{
    #[Route('/foo/bar')]
    public function index(CharacterFactory $characterFactory, ArmorRepository $armorRepository, WeaponRepository $weaponRepository): Response
    {

        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        $character = $user->getPlayerCharacter();

        $id = $user->getEmail();

        $characterFactory->create($character);
        

        return new Response('foo bar '.$id);
    }
}