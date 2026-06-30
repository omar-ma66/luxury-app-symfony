<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Job;
use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/client')]
final class ClientController extends AbstractController
{
    #[Route(name: 'app_client_index', methods: ['GET'])]
    public function index(ClientRepository $clientRepository): Response
    {
        return $this->render('client/index.html.twig', [
            'clients' => $clientRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_client_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {  
        $user = $this->getUser();
        if(!$user)
            {
                throw $this->createAccessDeniedException("vous devez etre connecter");
            }
        /**   @var User $user */
        
        $client = new Client();
        /** @var User $user   */    
       $user->addClient($client);
   
        $form = $this->createForm(ClientType::class, $client); 
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($client);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('client/new.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_show', methods: ['GET'])]
    public function show(Client $client): Response
    {
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Client $client, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('client/edit.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_delete', methods: ['POST'])]
    public function delete(Request $request, Client $client, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$client->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($client);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_client_index', [], Response::HTTP_SEE_OTHER);
    }

      #[Route('/{id}/liste', name: 'app_client_liste', methods: ['GET','POST'])]
    public function liste(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager,int $id): Response
    {

          $alluser=                                      $userRepository->findAll();
          $alljob=[] ;
          $candidats=[];
          $job=[];
                                        foreach ($alluser as $us)
                                            {  
                                                $alljob[] = $us->getJobs();    
                                                $candidats[] = $us->getCandidats();
                                            }       
                
                                        foreach($alljob as $jb)
                                            { 
                                                 /** @var Job $j */    
                                                 foreach($jb as $j )
                                                { 
                                                    $client =  $j->getClient() ;
                                                        $idc =  $client->getId();
                                                            if ($idc === $id)
                                                                    {
                                                                        $job[] = $j ;
                                                                    }
                                                }
                                            }
                       /** @var Job $job */    
        return $this->render('client/liste.html.twig',['job'=>$job ,'candidats'=>$candidats]);
    }
}
