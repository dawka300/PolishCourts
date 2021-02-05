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
//        dd($this->isGranted('ROLE_ADMIN'));

        return $this->redirect($routeBuilder->setController(CourtCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('PolishCourts');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Główne ustawienia');
        yield MenuItem::linktoDashboard('Strona główna', 'fa fa-home');
        yield MenuItem::linkToCrud('Użytownicy', 'fas fa-user', UserCrudController::getEntityFqcn());

        yield MenuItem::section('Dodatkowe ustawienia');
         yield MenuItem::linkToCrud('Wydziały', 'fas fa-university', DivisionCrudController::getEntityFqcn());
         yield MenuItem::linkToCrud('Stanowisko', 'fas fa-building', PositionCrudController::getEntityFqcn());
         yield MenuItem::linkToCrud('Uczelnie', 'fas fa-graduation-cap', UniversityCrudController::getEntityFqcn());
        yield MenuItem::section('Wyjście');
        yield MenuItem::linkToLogout('Logout', 'fa fa-sign-out');
    }
}
