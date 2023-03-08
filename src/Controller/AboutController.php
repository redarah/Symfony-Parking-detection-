<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Repository\PlaceRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(UsersRepository $usersrepo,PlaceRepository $place,ImageRepository $image): Response
    {
        return $this->render('about/index.html.twig');
    }


}