<?php

namespace App\Controller;

use App\Entity\Ecoles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EcolesController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }

    /**
     * @Route("/ecoles", name="ecoles")
     */
    public function index(): Response
    { 
        $ecole = $this->entityManager->getRepository(Ecoles::class)->findAll();
        return $this->render('ecoles/index.html.twig', [
            'ecole' => $ecole
        ]);
    }
}
