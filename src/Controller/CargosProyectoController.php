<?php

namespace App\Controller;


use App\Entity\Cargos;
use App\Entity\Proyecto;
use App\Entity\CargosProyecto;
use App\Form\CargosProyectoType;
use App\Repository\CargosProyectoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/cargosproyecto")
 */
class CargosProyectoController extends AbstractController
{
    /**
     * @Route("/", name="cargos_proyecto_index", methods={"GET"})
     */
    public function index(CargosProyectoRepository $cargosProyectoRepository): Response
    {
       
        
        return $this->render('cargos_proyecto/index.html.twig', [
            'cargos_proyectos' => $cargosProyectoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cargos_proyecto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cargosProyecto = new CargosProyecto();
        $form = $this->createForm(CargosProyectoType::class, $cargosProyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cargosProyecto);
            $entityManager->flush();

            return $this->redirectToRoute('cargos_proyecto_index');
        }

        return $this->render('cargos_proyecto/new.html.twig', [
            'cargos_proyecto' => $cargosProyecto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cargos_proyecto_show", methods={"GET"})
     */
    public function show(CargosProyecto $cargosProyecto): Response
    {
        return $this->render('cargos_proyecto/show.html.twig', [
            'cargos_proyecto' => $cargosProyecto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cargos_proyecto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CargosProyecto $cargosProyecto): Response
    {
        $form = $this->createForm(CargosProyectoType::class, $cargosProyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cargos_proyecto_index', [
                'id' => $cargosProyecto->getId(),
            ]);
        }

        return $this->render('cargos_proyecto/edit.html.twig', [
            'cargos_proyecto' => $cargosProyecto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cargos_proyecto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CargosProyecto $cargosProyecto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cargosProyecto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cargosProyecto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cargos_proyecto_index');
    }
}
