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

        return $this->redirect($routeBuilder->setController(DivisionCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PolishCourts');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Strona główna', 'fa fa-home');
         yield MenuItem::linkToCrud('Wydziały', 'fas fa-list', DivisionCrudController::getEntityFqcn());
         yield MenuItem::linkToCrud('Stanowisko', 'fas fa-list', PositionCrudController::getEntityFqcn());
         yield MenuItem::linkToCrud('Uczelnie', 'fas fa-list', UniversityCrudController::getEntityFqcn());
         yield MenuItem::linkToCrud('Użytownicy', 'fas fa-list', UserCrudController::getEntityFqcn());
        yield MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
