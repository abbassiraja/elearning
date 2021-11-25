<?php

namespace App\Controller;

use App\Entity\Cours;
use DateTimeImmutable;
use App\Entity\Commentaire;
use App\Form\SearchCourType;
use App\Form\CommentaireType;
use App\Repository\CoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
    public function index(Request $request, PaginatorInterface $paginator, CoursRepository $coursRepo ): Response
    {
        $donnees = $this->entityManager->getRepository(Cours::class)->findAll();

        $cour = $paginator->paginate(
            $donnees, //on passe les donnees
            $request->query->getInt('page', 1),//numero de la page en cour ,1 par defaut
            10
        );

        

        $form = $this->createForm(SearchCourType::class);
        
        $search = $form->handleRequest($request);

      
        return $this->render('cours/index.html.twig', [
           
            'cour' => $cour,
            'form' => $form->createView()
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


   
