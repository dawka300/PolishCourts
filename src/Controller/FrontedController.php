<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontedController extends AbstractController
{
    /**
     * @Route("/", name="main_view")
     */
    public function index(): Response
    {
        return $this->render('fronted/index.html.twig', [
            'controller_name' => 'FrontedController',
        ]);
    }
}
