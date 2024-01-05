<?php

namespace App\Controller;

use App\Entity\Direccion;
use App\Form\DireccionType;
use App\Repository\DireccionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/direccion")
 */
class DireccionController extends AbstractController
{
    /**
     * @Route("/", name="app_direccion_index", methods={"GET"})
     */
    public function index(DireccionRepository $direccionRepository): Response
    {
        return $this->render('direccion/index.html.twig', [
            'direccions' => $direccionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_direccion_new", methods={"GET", "POST"})
     */
    public function new(Request $request, DireccionRepository $direccionRepository): Response
    {
        $direccion = new Direccion();
        $form = $this->createForm(DireccionType::class, $direccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $direccionRepository->add($direccion);
            return $this->redirectToRoute('app_direccion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('direccion/new.html.twig', [
            'direccion' => $direccion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_direccion_show", methods={"GET"})
     */
    public function show(Direccion $direccion): Response
    {
        return $this->render('direccion/show.html.twig', [
            'direccion' => $direccion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_direccion_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Direccion $direccion, DireccionRepository $direccionRepository): Response
    {
        $form = $this->createForm(DireccionType::class, $direccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $direccionRepository->add($direccion);
            return $this->redirectToRoute('app_direccion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('direccion/edit.html.twig', [
            'direccion' => $direccion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_direccion_delete", methods={"POST"})
     */
    public function delete(Request $request, Direccion $direccion, DireccionRepository $direccionRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$direccion->getId(), $request->request->get('_token'))) {
            $direccionRepository->remove($direccion);
        }

        return $this->redirectToRoute('app_direccion_index', [], Response::HTTP_SEE_OTHER);
    }
}
