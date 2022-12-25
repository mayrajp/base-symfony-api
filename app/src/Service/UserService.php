<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    public function generateUsersList()
    {
        return $this->userRepository->findAll();
    }

    public function create(array $data): ?User
    {

        $email = $this->userRepository->findBy(["email" => $data['email']]);

        if ($email != null) {
            return null;
        }

        $user = new User();
        $user
            ->setUsername($data['username'])
            ->setEmail($data['email'])
            ->setActive(true)
            ->setRoles([$data['role']]);

        $user->setPassword($this->passwordHasher
            ->hashPassword($user, $data['password']));

        $this->userRepository->persist($user);

        return $user;
    }

    public function update(User $user, array $data): ?User
    {

        $user = $this->userRepository->findOneBy(["email" => $data['update_user']["email"]]);
        
        $user
            ->setUsername($data['update_user']['username'])
            ->setEmail($data['update_user']['email'])
            ->setRoles([$data['update_user']['role']]);

        $this->userRepository->persist($user);

        return $user;
    }

    public function changeUserStatus(User $user): User
    {

        $oldStatus = $user->isActive();

        $user->setActive(!$oldStatus);

        $this->userRepository->persist($user);

        return $user;
    }
}
