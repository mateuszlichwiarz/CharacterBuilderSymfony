<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\ORM\EntityManagerInterface;

use App\Logic\Character\CharacterView;
use App\Logic\Character\CharacterFighter;
use App\Logic\Character\CharacterEquipment;


use App\Logic\Utils\LoadData;

class ExampleController extends AbstractController
{
    #[Route('/foo/bar')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $character = new CharacterView($user);
        $attrValues = $character->getAttrValues();

        $characterEquipment = new CharacterEquipment($user);
        $weapon = $characterEquipment->getWeapon();

        return new Response('foo bar '.$weapon);
    }
}