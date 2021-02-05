<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(CourtCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PolishCourts');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Main settings');
        yield MenuItem::linktoDashboard('Main page', 'fa fa-home');
        yield MenuItem::linkToCrud('Judges', 'fas fa-id-card', JudgeCrudController::getEntityFqcn());
        yield MenuItem::linkToCrud('Users', 'fas fa-user', UserCrudController::getEntityFqcn());

        yield MenuItem::section('Additional settings');
         yield MenuItem::linkToCrud('Divisions', 'fas fa-university', DivisionCrudController::getEntityFqcn());
         yield MenuItem::linkToCrud('Positions', 'fas fa-building', PositionCrudController::getEntityFqcn());
         yield MenuItem::linkToCrud('Universities', 'fas fa-graduation-cap', UniversityCrudController::getEntityFqcn());
        yield MenuItem::section('Exit');
        yield MenuItem::linkToLogout('Logout', 'fa fa-sign-out');
    }
}
