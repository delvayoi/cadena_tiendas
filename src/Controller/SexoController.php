<?php

namespace App\Controller;

use App\Entity\Sexo;
use App\Form\SexoType;
use App\Repository\SexoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sexo")
 */
class SexoController extends AbstractController
{
    /**
     * @Route("/", name="app_sexo_index", methods={"GET"})
     */
    public function index(SexoRepository $sexoRepository): Response
    {
        return $this->render('sexo/index.html.twig', [
            'sexos' => $sexoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_sexo_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SexoRepository $sexoRepository): Response
    {
        $sexo = new Sexo();
        $form = $this->createForm(SexoType::class, $sexo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sexoRepository->add($sexo);
            return $this->redirectToRoute('app_sexo_index', [], Response::HTTP_SEE_OTHER);
        }
       

        return $this->render('sexo/new.html.twig', [
        
            'sexo' => $sexo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_sexo_show", methods={"GET"})
     */
    public function show(Sexo $sexo): Response
    {
        return $this->render('sexo/show.html.twig', [
            'sexo' => $sexo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_sexo_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Sexo $sexo, SexoRepository $sexoRepository): Response
    {
        $form = $this->createForm(SexoType::class, $sexo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sexoRepository->add($sexo);
            return $this->redirectToRoute('app_sexo_index', [], Response::HTTP_SEE_OTHER);
        }
             
        return $this->render('sexo/edit.html.twig', [
            'sexo' => $sexo,
           
        'form' => $form->createView(),
           /// 'form' => $form
        ]);
    }

    /**
     * @Route("/{id}", name="app_sexo_delete", methods={"POST"})
     */
    public function delete(Request $request, Sexo $sexo, SexoRepository $sexoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sexo->getId(), $request->request->get('_token'))) {
            $sexoRepository->remove($sexo);
        }

        return $this->redirectToRoute('app_sexo_index', [], Response::HTTP_SEE_OTHER);
    }
}
