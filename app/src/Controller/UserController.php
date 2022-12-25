<?php

namespace App\Controller;

use App\Entity\User;
use App\FormType\NewUserType;
use App\FormType\UpdateUserType;
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

    #[Route('/create', name: 'create', methods: ['GET', 'POST'])]
    public function create(Request $request)
    {
        $form = $this->createForm(NewUserType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $response = $this->userService->create($data);

            if ($response == null) {
                $this->addFlash('error', 'Este email já está sendo usado por outro usuário.');


                return $this->render('user/create.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            $this->addFlash('success', 'Usuário criado com sucesso.');

            return $this->redirectToRoute('admin_user_index');
        }

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/update/{user}', name: 'update', methods: ['GET', 'POST'])]
    public function update(Request $request, User $user)
    {
        $form = $this->createForm(UpdateUserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $response = $this->userService->update($user, $request->request->all());

            if ($response == null) {
                $this->addFlash('error', 'Este email já está sendo usado por outro usuário.');


                return $this->render('user/update.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            $this->addFlash('success', 'Usuário alterado com sucesso.');

            return $this->redirectToRoute('admin_user_index');
        }

        return $this->render('user/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/change/status/{user}', name: 'change_status', methods: ['GET'])]
    public function changeStatus(Request $request, User $user)
    {
        try {

            $this->userService->changeUserStatus($user);

            return $this->redirectToRoute('admin_user_index');
        } catch (\Exception $exception) {

            return $exception->getMessage();
        }
    }
}
