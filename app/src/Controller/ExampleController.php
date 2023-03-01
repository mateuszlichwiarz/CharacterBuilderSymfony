<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleController
{
    #[Route('/foo/bar')]
    public function index(): Response
    {
        return new Response('kurwa szssmata działa');
    }
}