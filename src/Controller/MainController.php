<?php

namespace App\Controller;


use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{

    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(): Response
    {

        return $this->render('main/index.html.twig');

    }

//    #[Route('/home', name: 'app_home')]
//    public function home(): Response
//    {
//
//        return $this->render('main/home2.html.twig');
//    }


    #[Route('/home/aboutUs', name: 'app_aboutUs')]
    public function aboutUs(): Response
    {

        return $this->render('main/aboutUs.html.twig');
    }

    #[Route('/list', name: 'app_list')]
    public function list(): Response
    {


        return $this->render('main/list.html.twig');
    }


    #[Route('/list/detail', name: 'app_detail')]
    public function detail(WishRepository $wishRepository): Response
    {
        $wishes = $wishRepository->findAll();

        return $this->render('main/detail.html.twig', [

            'wishes' => $wishes,
        ]);
    }


}

