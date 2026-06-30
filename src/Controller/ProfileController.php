<?php

namespace App\Controller;
use Symfony\Component\Security\Http\Attribute\IsGranted;

use App\Entity\User;
use App\Entity\Job;
use App\Repository\JobRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'app_profile')]
    #[isGranted('ROLE_CANDIDAT')]
    public function index(UserRepository $userRepository ,Job $job,JobRepository $jobRepository,EntityManagerInterface $em)
    {
        
        $user = $this->getUser();
        if(!$user)
            {
                throw $this->createNotFoundException("vous devez être connecte");
            }
        // $job = $jobRepository->find($id);

        /** @var User $user */
                $user->addJob($job);
                $em->persist($user);
                $em->flush();
        return $this->redirectToRoute('app_home');
  

        // return $this->render('profile/index.html.twig', [
        //     'controller_name' => 'ProfileController',
        // ]);
    }
}
