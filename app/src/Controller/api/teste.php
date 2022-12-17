<?php

namespace App\Controller\api;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/api', methods: ['GET'])]
class teste extends AbstractController
{

    public function __construct(private EntityManagerInterface $em, private UserPasswordHasherInterface $encoder)
    {
    }

    #[Route('/index', name: 'index', methods: ['GET'])]
    public function welcome(Request $request)
    {

        return $this->render('templates/welcome.html.twig', []);
    }
}
