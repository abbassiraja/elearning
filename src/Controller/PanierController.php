<?php

namespace App\Controller;

use App\Repository\CoursRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session, CoursRepository $coursRepository): Response
    {
        $panier = $session->get('panier', []);
        $panierwithData = [];

        foreach($panier as $id => $quantity){
            $panierwithData[] = [
                'cour' => $coursRepository->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;

        foreach($panierwithData as $item){
            $totalitem = $item['cour']->getprix() * $item['quantity'];
            $total += $totalitem;
        }
        
        return $this->render('panier/index.html.twig', [
            'item' => $panierwithData,
            'total' => $total
        ]);
    }

    /**
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session){

        
        $panier = $session->get('panier',[]);
        if (!empty($panier[$id])){
            $panier[$id]++; }
            else {
             $panier[$id] = 1;    
            }
       
        $session->set('panier', $panier);
        return $this->redirectToRoute("panier");

    }

    /**
     * @Route("/panier/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session){
       $panier = $session->get('panier', []);

       if(!empty($panier[$id])){
           unset($panier[$id]);
       }
       $session->set('panier', $panier);
       return $this->redirectToRoute("panier");
    }

}
