<?php

namespace App\Controller;

use App\Entity\Fichepatient;
use App\Form\FichePatientFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FichePatientController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/fiche', name: 'app_fiche_patient')]
    public function index(Request $request): Response
    {
        $fiche = new Fichepatient();
        $form = $this->createForm(FichePatientFormType::class, $fiche);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($fiche);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_fiche_patient');
        }

        return $this->render('fichepatient/fichepatient.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
