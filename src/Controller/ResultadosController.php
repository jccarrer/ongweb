<?php

namespace App\Controller;

use App\Entity\Resultados;
use App\Form\ResultadosType;
use App\Repository\ResultadosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("admin/resultados")
 */
class ResultadosController extends AbstractController
{
    /**
     * @Route("/", name="resultados_index", methods={"GET"})
     */
    public function index(ResultadosRepository $resultadosRepository, PaginatorInterface $paginator,Request $request): Response
    {

		$allresultados = $resultadosRepository->findAll();

        // Paginate the results of the query
        $resultados = $paginator->paginate(
            // Doctrine Query, not results
            $allresultados,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            3
        );



        return $this->render('resultados/index.html.twig', [
            'resultados' => $resultados,
        ]);
    }

    /**
     * @Route("/new", name="resultados_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resultado = new Resultados();
        $form = $this->createForm(ResultadosType::class, $resultado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resultado);
            $entityManager->flush();

            return $this->redirectToRoute('resultados_index');
        }

        return $this->render('resultados/new.html.twig', [
            'resultado' => $resultado,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resultados_show", methods={"GET"})
     */
    public function show(Resultados $resultado): Response
    {
        return $this->render('resultados/show.html.twig', [
            'resultado' => $resultado,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="resultados_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Resultados $resultado): Response
    {
        $form = $this->createForm(ResultadosType::class, $resultado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultados_index', [
                'id' => $resultado->getId(),
            ]);
        }

        return $this->render('resultados/edit.html.twig', [
            'resultado' => $resultado,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="resultados_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Resultados $resultado): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resultado->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($resultado);
            $entityManager->flush();
        }

        return $this->redirectToRoute('resultados_index');
    }
}
