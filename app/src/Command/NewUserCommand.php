<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(name: 'app:new:user', description: 'create new user')]
class NewUserCommand extends Command
{
    public const ROLES = [
        1 => ['ROLE_ADMIN'],
        2 => ['ROLE_USER'],
    ];

    public function __construct(private UserPasswordHasherInterface $passwordHasher,
                                private UserRepository $userRepository)
    {
        parent::__construct('app:new:user');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $username = $io->ask('Enter user username');
        $password = $io->ask('User password');
        $role = $io->ask("Enter user's role ([1] for admin or [2] for user)");
        $role_string = self::ROLES[$role][0];
        $io->writeln("creating user with this username: $username and this password: $password and role $role_string");

        $user = new User();
        $user
            ->setUsername($username)
            ->setRoles(self::ROLES[$role])
            ->setPassword($this->passwordHasher->hashPassword($user, $password));

        $this->userRepository->add($user, true);

        $io->success('User Created!!!');

        return Command::SUCCESS;
    }
}
