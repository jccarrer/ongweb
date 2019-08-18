<?php

namespace App\Controller;

use App\Entity\DocumentosVerificacion;
use App\Form\DocumentosVerificacionType;
use App\Repository\DocumentosVerificacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/documentos/verificacion")
 */
class DocumentosVerificacionController extends AbstractController
{
    /**
     * @Route("/", name="documentos_verificacion_index", methods={"GET"})
     */
    public function index(DocumentosVerificacionRepository $documentosVerificacionRepository): Response
    {
        return $this->render('documentos_verificacion/index.html.twig', [
            'documentos_verificacions' => $documentosVerificacionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="documentos_verificacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $documentosVerificacion = new DocumentosVerificacion();
        $form = $this->createForm(DocumentosVerificacionType::class, $documentosVerificacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($documentosVerificacion);
            $entityManager->flush();

            return $this->redirectToRoute('documentos_verificacion_index');
        }

        return $this->render('documentos_verificacion/new.html.twig', [
            'documentos_verificacion' => $documentosVerificacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="documentos_verificacion_show", methods={"GET"})
     */
    public function show(DocumentosVerificacion $documentosVerificacion): Response
    {
        return $this->render('documentos_verificacion/show.html.twig', [
            'documentos_verificacion' => $documentosVerificacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="documentos_verificacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DocumentosVerificacion $documentosVerificacion): Response
    {
        $form = $this->createForm(DocumentosVerificacionType::class, $documentosVerificacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentos_verificacion_index', [
                'id' => $documentosVerificacion->getId(),
            ]);
        }

        return $this->render('documentos_verificacion/edit.html.twig', [
            'documentos_verificacion' => $documentosVerificacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="documentos_verificacion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DocumentosVerificacion $documentosVerificacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$documentosVerificacion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($documentosVerificacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('documentos_verificacion_index');
    }
}
