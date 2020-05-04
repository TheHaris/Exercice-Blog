<?php

namespace App\Controller;

use App\Form\FormCreateType;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class FormCreateController extends AbstractController
{
    /**
     * @Route("/FormCreate", name="form_create")
     */
    public function index(Request $request)
    {
      $postForm = new Post;
      $em = $this->getDoctrine()->getManager();
      $form = $this->createForm(FormCreateType::class,$postForm);

      if ($request->isMethod('POST')&& $form->handleRequest($request)->isValid()) {
        $em->persist($postForm);
        $em->flush();
      }

        return $this->render('form_create/index.html.twig', [
          'form' => $form->createView(),
        ]);
    }


     /**
     * @Route("/blog/edit/{id}", name="blog_edit")
     */
     public function edit(Post $post,Request $request)
     {
        $form = $this->create(FormCreateType::class,$postForm);
        $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            return new RedirectResponse (
            $this->router->generate('blog')
            );
          }
      return $this->render('edit.html.twig', [
        'form' => $form->createView()
      ]);
     }

      /**
     * @Route("/blog{id}", name="blog_delete")
     */
     public function delete(Post $post)
     {
      $this->entityManager->remove($post);
      $this->entityManager->flush();
      return new RedirectResponse (
        $this->router->generate('blog')
      );
     }




}
