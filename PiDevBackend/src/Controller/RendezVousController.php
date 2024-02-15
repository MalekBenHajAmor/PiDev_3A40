<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class RendezVousController extends AbstractController
{
    #[Route('/rendezvous', name: 'app_rendez_vous')]
    public function index(Request $request, UsersRepository $userRepository): Response
    {
        $name = $request->query->get('name');
        $medecins = [];

        // Check if a search query is provided
        if ($name) {
            // Call findByNom method if a search query is provided
            $medecins = $userRepository->findByNom($name);
        }

        return $this->render('rendez_vous/rendezvous.html.twig', [
            'controller_name' => 'RendezVousController',
            'medecins' => $medecins,
        ]);
    }



    
    
    
     
     #[Route("/api/users", name:"api_users", methods:"GET")]
    
    public function getAllUsers(UsersRepository $usersRepository): JsonResponse
    {
        // Fetch all users' data from the repository
        $users = $usersRepository->findAll();

        // Convert the users array to JSON and return it
        return $this->json($users);
    }

    #[Route("/api/users/{nom}", name:"api_users_search_by_nom", methods: ["GET"])]
    public function searchUsersByNom(string $nom, UsersRepository $usersRepository): JsonResponse
    {
        // Rechercher les utilisateurs par nom
        $users = $usersRepository->findByNom($nom);

        // Convertir le tableau d'utilisateurs en JSON et le retourner
        return $this->json($users);
    }

}
