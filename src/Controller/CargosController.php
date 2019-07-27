<?php

namespace App\Controller;

use App\Entity\Cargos;
use App\Form\CargosType;
use App\Repository\CargosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/cargos")
 */
class CargosController extends AbstractController
{
    /**
     * @Route("/", name="cargos_index", methods={"GET"})
     */
    public function index(CargosRepository $cargosRepository): Response
    {
        return $this->render('cargos/index.html.twig', [
            'cargos' => $cargosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cargos_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cargo = new Cargos();
        $form = $this->createForm(CargosType::class, $cargo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cargo);
            $entityManager->flush();

            return $this->redirectToRoute('cargos_index');
        }

        return $this->render('cargos/new.html.twig', [
            'cargo' => $cargo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cargos_show", methods={"GET"})
     */
    public function show(Cargos $cargo): Response
    {
        return $this->render('cargos/show.html.twig', [
            'cargo' => $cargo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cargos_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cargos $cargo): Response
    {
        $form = $this->createForm(CargosType::class, $cargo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cargos_index', [
                'id' => $cargo->getId(),
            ]);
        }

        return $this->render('cargos/edit.html.twig', [
            'cargo' => $cargo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cargos_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cargos $cargo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cargo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cargo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cargos_index');
    }
}
