<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Repository\PlaceRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ServiceController extends AbstractController
{
    #[Route('/service', name: 'service')]
    public function index(UsersRepository $usersrepo,PlaceRepository $place,ImageRepository $image): Response
    {
        return $this->render('services/index.html.twig');
    }


}