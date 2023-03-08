<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Repository\PlaceRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomePageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(UsersRepository $usersrepo,PlaceRepository $place,ImageRepository $image): Response
    {
        return $this->render('home_page/index.html.twig',[
            'first_name' => $usersrepo->findBy([],['id' => 'asc'])
        ]);
    }


}