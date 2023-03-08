<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Avis;
use App\Form\ReviewFormType;
use App\Security\UsersAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class AvisController extends AbstractController
{
    private $em;


    public function __construct( EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /*#[Route('/review', name: 'review')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UsersAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Users();
        $avis = new Avis();
        $form = $this->createForm(ReviewFormType::class, $avis);

        $entityManager->persist($avis);
        $entityManager->flush();
        
        return $this->render('review/index.html.twig', [
            'AvisForm' => $form->createView(),
        ]);
    }*/

    #[Route('/review', name: 'review')]
    public function new(Request $request ,ManagerRegistry $doctrine,EntityManagerInterface $entityManager): Response
    
    {
        
        $avis = new Avis();
        $form = $this->createForm(ReviewFormType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($avis);
            $entityManager->flush();
            
            return $this->redirectToRoute('main');
        }

        return $this->render('review/index.html.twig', [
            'avis' => $avis,
            'AvisForm' => $form->createView()
        ]);
    }
}
