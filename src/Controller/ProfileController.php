<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(UserRepository $userRepository )
    {

  
    $alluser= $userRepository->findAll();

    dd($alluser);



        // return $this->render('profile/index.html.twig', [
        //     'controller_name' => 'ProfileController',
        // ]);
    }
}
