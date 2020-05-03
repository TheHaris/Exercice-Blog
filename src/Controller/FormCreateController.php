<?php

namespace App\Controller;

use App\Form\FormCreateType;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class FormCreateController extends AbstractController
{
    /**
     * @Route("/FormCreate", name="form_create")
     */
    public function index(Request $request)
    {
      $postForm = new Post;
      $em = $this->getDoctrine()->getManager();
      $form = $this->createForm(FormCreateType::class);

      if ($request->isMethod('POST')&& $form->handleRequest($request)->isValid()) {
        $em->flush();
      }

        return $this->render('form_create/index.html.twig', [
          'form' => $form->createView(),
        ]);
    }
}
