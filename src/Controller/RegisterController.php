<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/iscription", name="register")
     */
    public function index(Request $request , UserPasswordEncoderInterface $encoder): Response
    {
        $notification = null;

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $user = $form->getData();
            $user_find = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());

            if (!$user_find){

                $password = $encoder->encodePassword($user ,$user ->getPassword());
                $user ->setPassword($password);

                // On récupère les images transmises
            $images = $form->get('image')->getData();

            // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('brochures_directory'),
                    $fichier
                );

                // On stocke l'image dans la base de données (son nom)
                $img = new Images();
                $img->setName($fichier);
                $user->addImage($img);
            }
            }
            $entityManager = $this->getDoctrine()->getManager();
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $notification = "Votre inscription s'est bien déroulée";
        }else{
            $notification = "L'email utilié existe déja";
        }


        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
