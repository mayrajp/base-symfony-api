<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/dashboard', name: 'admin_dashboard_', methods: ['GET'])]
class DashboardController extends AbstractController
{
    public function __construct()
    {
        
    }

    #[Route('/index', name: 'index', methods: ['GET'])]
    public function returnDashboard()
    {
        return $this->render('dashboard/index.html.twig', []);
    }
}