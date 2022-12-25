<?php

namespace App\Tests\DataBuilder;

use App\Constant\UserConstants;
use App\Entity\User;

class UserDataBuilder
{
    public function create() : User
    {
        $user = new User();

        $username = "may";
        $password = "123";
        $email = "may@example.com";
        $role = UserConstants::ROLE_ADMIN;

        $user->setPassword($password);
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setRoles([$role]);

        return $user;
    }
}