<?php

namespace App\Controller;

use App\Repository\PlaceRepository;
use App\Repository\UsersRepository;
use App\Repository\ImageRepository;
use App\Entity\Place;
use App\Entity\Image;
use App\Entity\Users;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use App\Service\CallApiService;
use GuzzleHttp\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;



#[Route('/blassa', name: 'blassa ')]
class ApiTest extends AbstractController
{
    
    
    public function index(HttpClientInterface $httpClient,UsersRepository $usersrepo): Response
    {
        $response = $httpClient->request('GET', 'http://mdakk072.pythonanywhere.com/status');
        $places = $response->toArray();

        return $this->render('p_lace/index.html.twig', [
            'places' => $places,
        ]);
    }

}
