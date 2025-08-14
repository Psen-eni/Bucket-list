<?php

namespace App\Controller;


use App\Repository\WishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WishController extends AbstractController
{
    #[Route('/wish', name: 'wish')]
    public function index(EntityManagerInterface $em ): Response
    {
        

        return $this->render('wish/index.html.twig', [
            'controller_name' => 'WishController',
        ]);
    }


}
