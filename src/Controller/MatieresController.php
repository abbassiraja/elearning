<?php

namespace App\Controller;

use App\Entity\Matieres;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MatieresController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }
    /**
     * @Route("/matieres", name="matieres")
     */
    public function index(): Response
    {
        $matiere = $this->entityManager->getRepository(Matieres::class)->findAll();
        return $this->render('matieres/index.html.twig', [
            'matiere' => $matiere,
        ]);
    }
}
