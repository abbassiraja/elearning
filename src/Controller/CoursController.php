<?php

namespace App\Controller;

use App\Entity\Cours;
use DateTimeImmutable;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoursController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
    
        $this->entityManager = $entityManager;
    
       
    
    }
    /**
     * @Route("/cours", name="cours")
     */
    public function index(): Response
    {
        $cour = $this->entityManager->getRepository(Cours::class)->findAll();
        return $this->render('cours/index.html.twig', [
            'cour' => $cour,
        ]);
    }



     
    /**
    * @Route("/show/{id}",name="cour_show")
    */

    public function show($id){
     
        $cour = $this->getDoctrine()
        ->getRepository(Cours::class)
        ->findOneBy(['id'=>$id]);
        return $this->render('cours/show.html.twig',[
            
            'cour' => $cour
        ]);
    }


}


   
