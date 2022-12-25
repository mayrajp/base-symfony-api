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
        try {

            $users = $this->userService->generateUsersList();

            return $this->render('user/index.html.twig', [
                'users' => $users,
            ]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    #[Route('/create', name: 'create', methods: ['GET'])]
    public function create()
    {
        return $this->render('user/create.html.twig', []);
    }

    #[Route('/update/{id}', name: 'update', methods: ['GET'])]
    public function update(Request $request, $id)
    {
        return $this->render('user/update.html.twig', []);
    }

    #[Route('/change/status/{id}', name: 'change_status', methods: ['GET'])]
    public function changeStatus(Request $request, $id)
    {

        try {

            $this->userService->changeUserStatus($id);

            return $this->redirectToRoute('admin_user_index');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
