<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use App\Repository\PlaceRepository;
use App\Repository\ImageRepository;
use App\Repository\InformationRepository;
use App\Entity\Information;
use App\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//#[Route('/main', name: 'main')]
class MainController extends AbstractController
{
    //#[Route('/{image_name}', name: '_image')]
    #[Route('/main', name: 'main')]
    public function index(UsersRepository $usersrepo,PlaceRepository $place,ImageRepository $image): Response
    {
    
        //$newpic=$info->getImageName();
        //$newid=$place_->getId();

        return $this->render('main/index.html.twig', [
            
            //'image_name'=>$info->findBy([],['id' => 'asc']),
            //     'category' => $category,
            //'image_name'=>$newpic,
            //'id'=>$newid,
            'first_name' => $usersrepo->findBy([],['id' => 'asc']),
            'places' => $place->findBy([],['id' => 'asc']),
            'images' => $image->findBy([],['id' => 'asc']),
            
        ]);
    }

    


}