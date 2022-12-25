<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/admin/user', name: 'admin_user_')]
class UserController extends AbstractController
{
    public function __construct(private UserService $userService)
    {
        
    }

    #[Route('/index', name: 'index', methods: ['GET'])]
    public function index(Request $request)
    {
        try{

            $users = $this->userService->generateUsersList();

            return $this->render('user/index.html.twig', [
                'users' => $users,
            ]);
            

        }catch(\Exception $exception)
        {
            return $exception->getMessage();
        }

    }

    #[Route('/create', name: 'create', methods: ['GET'])]
    public function create()
    {
        return $this->render('user/create.html.twig', [
          
        ]);
        
    }

    #[Route('/update/{id}', name: 'update', methods: ['POST'])]
    public function update()
    {

    }

    #[Route('/update/{id}', name: 'update', methods: ['POST'])]
    public function changeUserStatus()
    {

    }
}