<?php

namespace App\Controller;

use App\Entity\Publicite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PubliciteController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/publicite", name="publicite")
     */
    public function index(): Response
    {
        $pub = $this->entityManager->getRepository(Publicite::class)->findAll();
        return $this->render('publicite/index.html.twig', [
            'pub' =>$pub,
        ]);
    }
}
