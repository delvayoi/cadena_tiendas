<?php

namespace App\Controller;

use App\Entity\Tienda;
use App\Form\TiendaType;
use App\Repository\TiendaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tienda")
 */
class TiendaController extends AbstractController
{
    /**
     * @Route("/", name="app_tienda_index", methods={"GET"})
     */
    public function index(TiendaRepository $tiendaRepository): Response
    {
        return $this->render('tienda/index.html.twig', [
            'tiendas' => $tiendaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_tienda_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TiendaRepository $tiendaRepository): Response
    {
        $tienda = new Tienda();
        $form = $this->createForm(TiendaType::class, $tienda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tiendaRepository->add($tienda);
            return $this->redirectToRoute('app_tienda_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->render('tienda/new.html.twig', [
            'tienda' => $tienda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_tienda_show", methods={"GET"})
     */
    public function show(Tienda $tienda): Response
    {
        return $this->render('tienda/show.html.twig', [
            'tienda' => $tienda,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_tienda_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tienda $tienda, TiendaRepository $tiendaRepository): Response
    {
        $form = $this->createForm(TiendaType::class, $tienda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tiendaRepository->add($tienda);
            return $this->redirectToRoute('app_tienda_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tienda/edit.html.twig', [
            'tienda' => $tienda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_tienda_delete", methods={"POST"})
     */
    public function delete(Request $request, Tienda $tienda, TiendaRepository $tiendaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tienda->getId(), $request->request->get('_token'))) {
            $tiendaRepository->remove($tienda);
        }

        return $this->redirectToRoute('app_tienda_index', [], Response::HTTP_SEE_OTHER);
    }
}
