<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RendezVousController extends AbstractController
{
    #[Route('/rendezvous', name: 'app_rendez_vous')]
    public function index(): Response
    {
        return $this->render('rendez_vous/rendezvous.html.twig', [
            'controller_name' => 'RendezVousController',
        ]);
    }
}
