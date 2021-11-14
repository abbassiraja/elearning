<?php

namespace App\Controller;

use App\Entity\Cours;
use DateTimeImmutable;
use App\Entity\Commentaire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/comment/add", name="comment_add")
     */
    public function add(Request $request)
    {
        $post_id = $request->request->get('post_id');

        $user = $this->getUser();

        $post = $this->getDoctrine()
                ->getRepository(Cours::class)
                ->find($post_id);

        $comment = new Commentaire();
        $comment->setText($request->request->get('_comment'));
        $comment->setUser($user);
        $comment->setCour($post);
        $comment->setCreatedAt(new \DateTimeImmutable());

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($comment);
        $entityManager->flush();

        $post_id = $post->getId();

        return $this->redirectToRoute('cour_show',[
            'id' =>  $post_id
        ]);
    }
}
