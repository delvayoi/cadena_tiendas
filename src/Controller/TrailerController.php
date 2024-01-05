<?php

namespace App\Controller;

use App\Entity\Trailer;
use App\Form\TrailerType;
use App\Repository\TrailerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trailer")
 */
class TrailerController extends AbstractController
{
    /**
     * @Route("/", name="app_trailer_index", methods={"GET"})
     */
    public function index(TrailerRepository $trailerRepository): Response
    {
        return $this->render('trailer/index.html.twig', [
            'trailers' => $trailerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_trailer_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TrailerRepository $trailerRepository): Response
    {
        $trailer = new Trailer();
        $form = $this->createForm(TrailerType::class, $trailer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trailerRepository->add($trailer);
            return $this->redirectToRoute('app_trailer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trailer/new.html.twig', [
            'trailer' => $trailer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_trailer_show", methods={"GET"})
     */
    public function show(Trailer $trailer): Response
    {
        return $this->render('trailer/show.html.twig', [
            'trailer' => $trailer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_trailer_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Trailer $trailer, TrailerRepository $trailerRepository): Response
    {
        $form = $this->createForm(TrailerType::class, $trailer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trailerRepository->add($trailer);
            return $this->redirectToRoute('app_trailer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('trailer/edit.html.twig', [
            'trailer' => $trailer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_trailer_delete", methods={"POST"})
     */
    public function delete(Request $request, Trailer $trailer, TrailerRepository $trailerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trailer->getId(), $request->request->get('_token'))) {
            $trailerRepository->remove($trailer);
        }

        return $this->redirectToRoute('app_trailer_index', [], Response::HTTP_SEE_OTHER);
    }
}
