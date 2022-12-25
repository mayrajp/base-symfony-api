<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use PhpParser\Builder\Use_;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {

    }

    public function generateUsersList()
    {
        return $this->userRepository->findAll();
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function changeUserStatus(int $id) : User
    {
        $user = $this->userRepository->findOneBy(["id" => $id]);

        if(empty($user)){
            throw new \Exception("User not found");
        }
        
        $oldStatus = $user->isActive();

        $user->setActive(!$oldStatus);

        $this->userRepository->persist($user);

        return $user;

    }

}