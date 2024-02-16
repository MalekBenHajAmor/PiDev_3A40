<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MealRepository;
use App\Entity\Meal;
class MealController extends AbstractController
{
   
    #[Route('/meal', name: 'app_meal')]
    public function list(MealRepository $repo): Response
    { 
        // Récupérer tous les types de repas uniques
        $typesRepas = $repo->findUniqueMealTypes(); // Vous devez implémenter cette méthode dans votre repository

        // Passer les types de repas et tous les repas au modèle Twig
        return $this->render('meal/index.html.twig', [
            'typesRepas' => $typesRepas,
            'meals' => $repo->findAll(), // Récupérer tous les repas
        ]);
    }
    #[Route('/meal_details/{id}', name: 'meal_details')]
public function mealDetails(Meal $meal , MealRepository $repo,$id): Response
{
    $meal=$repo->find($id);
    return $this->render('meal/mealDetails.html.twig', [
        'meal' => $meal
    ]);
}
}

