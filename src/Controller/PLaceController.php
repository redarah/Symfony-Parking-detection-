<?php

namespace App\Controller;

use App\Repository\PlaceRepository;
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


#[Route('/place_dispo', name: 'places_')]
class PLaceController extends AbstractController
{

    #[Route('/{id}/{images}', name: 'details')]
    
    public function details(PlaceRepository $places,ImageRepository $image,Place $place): Response
    {
        //$images = $image->findBy([],['id' => 'asc']);
        //$places = $place->findBy([],['id' => 'asc']);

        //image 
        //$tsswira = $place->getImages();
        $newpic=$place->getName();
        //inforemarion sur la place 
        $empty = $place->isIsEmpty();
        $total = $place->getTotalPlace();
        $free = $place->getAvailablSpot();
        $full = $place->getFullSpot();



        return $this->render('p_lace/details.html.twig',compact('place','newpic','empty','total','free','full')
        //return $this->render('p_lace/api.html.twig',compact('place','newpic','empty','total','free','full')
    
    );
    }




    /*
    //Get Request 
    #[Route('/api', name: 'api_get',methods:['GET'] )]
    public function index(PlaceRepository $placerepository,NormalizerInterface $normalizer,ManagerRegistry $doctrine)
    {
        
        $place = $placerepository->findAll();
        
        $postNormalizer = $normalizer->normalize($place,null,['groups'=>'post:read']);
        $json = json_encode($postNormalizer);
        $response = new Response($json,200,[
            "Content-Type" => "application/json"
        ]);
       

        return $response;
    }

    //Post Request 
    #[Route('/api', name: 'api_pos',methods:['POST'] )]
    public function store(Request $request,SerializerInterface $serializer,EntityManagerInterface $em)
    {
        $jsonRecus = $request ->getContent();
        try{
            $post = $serializer->deserialize($jsonRecus,Place::class,'json');
            
            $em->persist($post);
            $em->flush();    
            dd($post);   
            return $this->json($post,201,[],['groups'=>'post:read']);
        }
        catch(NotEncodableValueException $e){
            return $this->json([
                'status'=> 400,
                'message'=> $e->getMessage() 
            ],400);
        }

    }
    private $mr;

    public function __construct(ManagerRegistry $registry)
    {
        $this->mr = $registry;
    }

    //Put request  
    #[Route('/api/{id}', name: 'api_put',methods:['PUT'] )]
    public function update_api (Request $request, $id, EntityManagerInterface $em): Response
    {
        $data = $this->mr->getRepository (Place::class)->find($id);
        $parameter = json_decode($request->getContent(), true);

        $data->setAvailablSpot($parameter ['Availabl_spot']);
        $data->setFullSpot($parameter ['full_spot']);
        $data->setTotalPlace($parameter ['total_place']);

    
        $em->persist ($data);
        $em->flush();

        dd($data); 
        return $this->json ('Updated Successfully!!');
    }
    */

    
    



}
