<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog")
     */
    public function index()
    {
      $posts = $this->getDoctrine()->getRepository(Post::class)
                    ->findBy([],['postDate'=>'DESC']);

      $latests = $this->getDoctrine()
                      ->getRepository(Post::class)
                      ->getLatest();

        return $this->render('blog/index.html.twig', [
            'posts' => $posts,
            'latests' => $latests
        ]);
    }
}
