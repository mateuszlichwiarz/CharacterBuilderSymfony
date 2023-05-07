<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\ORM\EntityManagerInterface;

class ExampleController extends AbstractController
{
    #[Route('/foo/bar')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        $id = $user->getEmail();

        return new Response('foo bar '.$id);
    }
}