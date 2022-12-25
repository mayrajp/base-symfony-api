<?php

namespace App\Service;

use App\Repository\UserRepository;

class DashboardService
{
    public function __construct(private UserRepository $userRepository)
    {

    }

    public function generateDashboardInfo()
    {
        $users = $this->userRepository->findActiveUsers();

        return count($users);
    }
}