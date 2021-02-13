<?php

namespace App\Controller;

use App\Entity\University;
use App\Repository\CourtRepository;
use App\Repository\UniversityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FrontedController extends AbstractController
{
    /**
     * @Route("/", name="main_view")
     */
    public function index(CourtRepository $repository): Response
    {
        $courts = $repository->findMilitaryCourts();

//        dd(in_array('ROLE_SUPER_ADMIN', $this->getUser()->getRoles()));
        return $this->render('fronted/index.html.twig', [
            'courts' => $courts,
        ]);
    }

    /**
     * @Route("/kontakt", name="contact_view")
     */

    public function contact(): Response
    {
        return $this->render('fronted/contact.html.twig');
    }
}
