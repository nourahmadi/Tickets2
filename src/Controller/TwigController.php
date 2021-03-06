<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwigController extends AbstractController
{
    #[Route('/twig', name: 'twig')]
    public function index(): Response
    {
        return $this->render('twig/index.html.twig');
    }

    #[Route('/twig', name: 'twig_fille')]
    public function fille(): Response
    {
        return $this->render('twig/fille.html.twig');
    }
}
