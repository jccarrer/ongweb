<?php

namespace App\Controller;

use App\Entity\Indicadores;
use App\Form\IndicadoresType;
use App\Repository\IndicadoresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/indicadores")
 */
class IndicadoresController extends AbstractController
{
    /**
     * @Route("/", name="indicadores_index", methods={"GET"})
     */
    public function index(IndicadoresRepository $indicadoresRepository): Response
    {
        return $this->render('indicadores/index.html.twig', [
            'indicadores' => $indicadoresRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="indicadores_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $indicadore = new Indicadores();
        $form = $this->createForm(IndicadoresType::class, $indicadore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($indicadore);
            $entityManager->flush();

            return $this->redirectToRoute('indicadores_index');
        }

        return $this->render('indicadores/new.html.twig', [
            'indicadore' => $indicadore,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="indicadores_show", methods={"GET"})
     */
    public function show(Indicadores $indicadore): Response
    {
        return $this->render('indicadores/show.html.twig', [
            'indicadore' => $indicadore,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="indicadores_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Indicadores $indicadore): Response
    {
        $form = $this->createForm(IndicadoresType::class, $indicadore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('indicadores_index', [
                'id' => $indicadore->getId(),
            ]);
        }

        return $this->render('indicadores/edit.html.twig', [
            'indicadore' => $indicadore,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="indicadores_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Indicadores $indicadore): Response
    {
        if ($this->isCsrfTokenValid('delete'.$indicadore->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($indicadore);
            $entityManager->flush();
        }

        return $this->redirectToRoute('indicadores_index');
    }
}
