<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Wish;
use App\Form\CategoryType;
use App\Form\WishType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/category/create', name: 'category_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $wish = new Wish();

        $form = $this->createForm(WishType::class, $wish);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($wish);


            $em->flush();

            $this->addFlash('success', 'Une nouvelle catégorie a été créée');
            return $this->redirectToRoute('app_detail', [
               'id' => $wish->getCategory()->getId(),
            ]);
        }


        return $this->render('category/edit.html.twig', [
            'category_form' => $form->createView(),
        ]);
    }
}





