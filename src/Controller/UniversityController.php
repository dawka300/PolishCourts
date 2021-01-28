<?php

namespace App\Controller;

use App\Entity\University;
use App\Form\UniversityType;
use App\Repository\UniversityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/university")
 */
class UniversityController extends AbstractController
{
    /**
     * @Route("/", name="university_index", methods={"GET"})
     * @param UniversityRepository $universityRepository
     * @return Response
     */
    public function index(UniversityRepository $universityRepository): Response
    {
        return $this->render('university/index.html.twig', [
            'universities' => $universityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="university_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $university = new University();
        $form = $this->createForm(UniversityType::class, $university);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($university);
            $entityManager->flush();

            return $this->redirectToRoute('university_index');
        }

        return $this->render('university/new.html.twig', [
            'university' => $university,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="university_show", methods={"GET"})
     * @param University $university
     * @return Response
     */
    public function show(University $university): Response
    {
        return $this->render('university/show.html.twig', [
            'university' => $university,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="university_edit", methods={"GET","POST"})
     * @param Request $request
     * @param University $university
     * @return Response
     */
    public function edit(Request $request, University $university): Response
    {
        $form = $this->createForm(UniversityType::class, $university);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('university_index');
        }

        return $this->render('university/edit.html.twig', [
            'university' => $university,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="university_delete", methods={"DELETE"})
     * @param Request $request
     * @param University $university
     * @return Response
     */
    public function delete(Request $request, University $university): Response
    {
        if ($this->isCsrfTokenValid('delete'.$university->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($university);
            $entityManager->flush();
        }

        return $this->redirectToRoute('university_index');
    }
}
