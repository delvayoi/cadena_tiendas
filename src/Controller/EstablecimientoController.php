<?php

namespace App\Controller;

use App\Entity\Establecimiento;
use App\Form\EstablecimientoType;
use App\Repository\EstablecimientoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/establecimiento")
 */
class EstablecimientoController extends AbstractController
{
    /**
     * @Route("/", name="app_establecimiento_index", methods={"GET"})
     */
    public function index(EstablecimientoRepository $establecimientoRepository): Response
    {
        return $this->render('establecimiento/index.html.twig', [
            'establecimientos' => $establecimientoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_establecimiento_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EstablecimientoRepository $establecimientoRepository): Response
    {
        $establecimiento = new Establecimiento();
        $form = $this->createForm(EstablecimientoType::class, $establecimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $establecimientoRepository->add($establecimiento);
            return $this->redirectToRoute('app_establecimiento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('establecimiento/new.html.twig', [
            'establecimiento' => $establecimiento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_establecimiento_show", methods={"GET"})
     */
    public function show(Establecimiento $establecimiento): Response
    {
        return $this->render('establecimiento/show.html.twig', [
            'establecimiento' => $establecimiento,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_establecimiento_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Establecimiento $establecimiento, EstablecimientoRepository $establecimientoRepository): Response
    {
        $form = $this->createForm(EstablecimientoType::class, $establecimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $establecimientoRepository->add($establecimiento);
            return $this->redirectToRoute('app_establecimiento_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('establecimiento/edit.html.twig', [
            'establecimiento' => $establecimiento,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_establecimiento_delete", methods={"POST"})
     */
    public function delete(Request $request, Establecimiento $establecimiento, EstablecimientoRepository $establecimientoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$establecimiento->getId(), $request->request->get('_token'))) {
            $establecimientoRepository->remove($establecimiento);
        }

        return $this->redirectToRoute('app_establecimiento_index', [], Response::HTTP_SEE_OTHER);
    }
}
