<?php

namespace App\Controller;

use App\Entity\Beneficiarios;
use App\Form\BeneficiariosType;
use App\Repository\BeneficiariosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/beneficiarios")
 */
class BeneficiariosController extends AbstractController
{
    /**
     * @Route("/", name="beneficiarios_index", methods={"GET"})
     */
    public function index(BeneficiariosRepository $beneficiariosRepository): Response
    {
        return $this->render('beneficiarios/index.html.twig', [
            'beneficiarios' => $beneficiariosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="beneficiarios_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $beneficiario = new Beneficiarios();
        $form = $this->createForm(BeneficiariosType::class, $beneficiario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($beneficiario);
            $entityManager->flush();

            return $this->redirectToRoute('beneficiarios_index');
        }

        return $this->render('beneficiarios/new.html.twig', [
            'beneficiario' => $beneficiario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="beneficiarios_show", methods={"GET"})
     */
    public function show(Beneficiarios $beneficiario): Response
    {
        return $this->render('beneficiarios/show.html.twig', [
            'beneficiario' => $beneficiario,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="beneficiarios_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Beneficiarios $beneficiario): Response
    {
        $form = $this->createForm(BeneficiariosType::class, $beneficiario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('beneficiarios_index', [
                'id' => $beneficiario->getId(),
            ]);
        }

        return $this->render('beneficiarios/edit.html.twig', [
            'beneficiario' => $beneficiario,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="beneficiarios_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Beneficiarios $beneficiario): Response
    {
        if ($this->isCsrfTokenValid('delete'.$beneficiario->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($beneficiario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('beneficiarios_index');
    }
}
