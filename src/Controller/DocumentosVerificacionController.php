<?php

namespace App\Controller;

use App\Entity\DocumentosVerificacion;
use App\Form\DocumentosVerificacionType;
use App\Repository\DocumentosVerificacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("admin/documentos/verificacion")
 */
class DocumentosVerificacionController extends AbstractController
{
    /**
     * @Route("/", name="documentos_verificacion_index", methods={"GET"})
     */
    public function index(DocumentosVerificacionRepository $documentosVerificacionRepository, PaginatorInterface $paginator,Request $request): Response
    {	
		
		$alldocumentos = $documentosVerificacionRepository->findAll();

		// Paginate the results of the query
        $documentos = $paginator->paginate(
            // Doctrine Query, not results
            $alldocumentos,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            2
        );





		
        return $this->render('documentos_verificacion/index.html.twig', [
            'documentos_verificacions' => $documentos,
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

			$file = $request->files->get('documentos_verificacion')['lista_asistencia_url'];
			$upload_directory = $this->getParameter('uploads_directory');
			$filename = md5(uniqid()) .'.'. $file->guessExtension();

			$file->move(
				$upload_directory,
				$filename
			);
			
			$file2 = $request->files->get('documentos_verificacion')['material_entregado_url'];
			$upload_directory = $this->getParameter('uploads_directory');
			$filename2 = md5(uniqid()) .'.'. $file2->guessExtension();

			$file2->move(
				$upload_directory,
				$filename2
			);


			$file3 = $request->files->get('documentos_verificacion')['foto_url'];
			$upload_directory = $this->getParameter('uploads_directory');
			$filename3 = md5(uniqid()) .'.'. $file3->guessExtension();

			$file3->move(
				$upload_directory,
				$filename3
			);







			/*
			echo "<pre>";
			var_dump($file3); die;
			*/



			$documentosVerificacion->setListaAsistenciaUrl($filename);
			$documentosVerificacion->setMaterialEntregadoUrl($filename2);
			$documentosVerificacion->setFotoUrl($filename3);

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
