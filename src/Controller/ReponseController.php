<?php

namespace App\Controller;
use App\Entity\Reponse;
use App\Form\ReponseType;

use App\Entity\Reclamation;
use App\Repository\ReclamationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReponseController extends AbstractController
{
    #[Route('/reponse', name: 'app_reponse')]
    public function index(Request $request,ReclamationRepository $reclamationRepository): Response
    {   $reclamation = new Reclamation();
        $form = $this->createForm(ReponseType::class, $reclamation);
        $form->handleRequest($request);
        return $this->render('reponse/index.html.twig', [
            'controller_name' => 'ReponseController',
            'form' => $form->createView(),
            'reclamation' => $reclamationRepository->findAll(),
        ]);
    }

    #[Route('/newRep', name: 'newRep', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reponse = new Reponse();
        $form = $this->createForm(ReponseType::class, $reponse);
        $form->handleRequest($request);
        
       if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reponse);
            $entityManager->flush();
            return $this->redirectToRoute('reponse');
        } 
        
        return $this->render('reponse/index.html.twig', [
            'form' => $form->createView(),
            'reponse' => $reponse,
            
        ]);
    }
 
}
