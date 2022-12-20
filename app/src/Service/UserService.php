<?php

namespace App\Service;

use App\Repository\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {

    }

    public function generateUsersList()
    {
        return $this->userRepository->findActiveUsers();
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function changeUserStatus()
    {

    }

}