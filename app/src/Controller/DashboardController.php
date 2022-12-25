<?php

namespace App\Controller;

use App\Service\DashboardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/dashboard', name: 'admin_dashboard_', methods: ['GET'])]
class DashboardController extends AbstractController
{
    public function __construct(private DashboardService $dashboardService)
    {
    }

    #[Route('/index', name: 'index', methods: ['GET'])]
    public function returnDashboard()
    {
        $info = $this->dashboardService->generateDashboardInfo();

        return $this->render('dashboard/index.html.twig', [
            "info" => $info
        ]);
    }
}
