<?php

namespace App\Controller;

use App\Entity\NiveauScolaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NiveauScolaireController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }
    /**
     * @Route("/niveau/scolaire", name="niveau_scolaire")
     */
    public function index(): Response
    {
        $niveauscolaire = $this->entityManager->getRepository(NiveauScolaire::class)->findAll();
        return $this->render('niveau_scolaire/index.html.twig', [
            'niveauscolaire' =>$niveauscolaire ,
        ]);
    }
}
