<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
     /**
        * @Route("/contact", name="contact")
        */
        public function index(Request $request , \Swift_Mailer $mailer)
        {
            $form = $this->createForm(ContactType::class);
            $form->handleRequest($request);
    
            if($form->isSubmitted() && $form->isValid()){
                $contact = $form->getData();
    
                // Ici enverrone le mail
                $message = (new \Swift_Message('Nouveau Contact'))
    
                // On attribue l'expéditeur
                ->setFrom($contact['email'])
    
                // On attribue le destinateure
                ->setTo('abbassirajap4@gmail.com')
    
                // On crée le message avec la vue twig
                ->setBody(
                    $this->renderView(
                       'email/contact.html.twig' , compact('contact')
                    ),
                    'text/html'
                )
                ;
    
                // On envoie le message
                $mailer->send($message);
    
                $this->addFlash('message', 'Le message a bien été envoyé');
                return $this->redirectToRoute('home');
            }
            return $this->render('contact/index.html.twig', [
                'contactForm' => $form->createview()
            ]);
        }
    }
