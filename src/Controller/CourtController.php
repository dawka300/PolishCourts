<?php

namespace App\Controller;

use App\Entity\Court;
use App\Form\CourtType;
use App\Repository\CourtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/court")
 */
class CourtController extends AbstractController
{
    /**
     * @Route("/", name="court_index", methods={"GET"})
     */
    public function index(CourtRepository $courtRepository): Response
    {
        return $this->render('court/index.html.twig', [
            'courts' => $courtRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="court_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $court = new Court();
        $form = $this->createForm(CourtType::class, $court);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($court);
            $entityManager->flush();

            return $this->redirectToRoute('court_index');
        }

        return $this->render('court/new.html.twig', [
            'court' => $court,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="court_show", methods={"GET"})
     */
    public function show(Court $court): Response
    {
        return $this->render('court/show.html.twig', [
            'court' => $court,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="court_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Court $court): Response
    {
        $form = $this->createForm(CourtType::class, $court);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('court_index');
        }

        return $this->render('court/edit.html.twig', [
            'court' => $court,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="court_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Court $court): Response
    {
        if ($this->isCsrfTokenValid('delete'.$court->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($court);
            $entityManager->flush();
        }

        return $this->redirectToRoute('court_index');
    }
}
