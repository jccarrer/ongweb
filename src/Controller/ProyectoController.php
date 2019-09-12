<?php

namespace App\Controller;

use App\Entity\Proyecto;
use App\Form\ProyectoType;
use App\Repository\ProyectoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("/admin/proyecto")
 */
class ProyectoController extends AbstractController
{
    /**
     * @Route("/", name="proyecto_index", methods={"GET"})
     */
    public function index(ProyectoRepository $proyectoRepository, PaginatorInterface $paginator,Request $request): Response
    {	

		
		$allproyectos = $proyectoRepository->findAll();

		// Paginate the results of the query
        $proyectos = $paginator->paginate(
            // Doctrine Query, not results
            $allproyectos,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            2
        );





        return $this->render('proyecto/index.html.twig', [
            'proyectos' => $proyectos,
        ]);
    }

    /**
     * @Route("/new", name="proyecto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $proyecto = new Proyecto();
        $form = $this->createForm(ProyectoType::class, $proyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($proyecto);
            $entityManager->flush();

            return $this->redirectToRoute('proyecto_index');
        }

        return $this->render('proyecto/new.html.twig', [
            'proyecto' => $proyecto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proyecto_show", methods={"GET"})
     */
    public function show(Proyecto $proyecto): Response
    {
        return $this->render('proyecto/show.html.twig', [
            'proyecto' => $proyecto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="proyecto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Proyecto $proyecto): Response
    {
        $form = $this->createForm(ProyectoType::class, $proyecto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proyecto_index', [
                'id' => $proyecto->getId(),
            ]);
        }

        return $this->render('proyecto/edit.html.twig', [
            'proyecto' => $proyecto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proyecto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Proyecto $proyecto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proyecto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($proyecto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proyecto_index');
    }


    /**
     * @Route("/ordenar", name="proyecto_order", methods={"GET"})
     */
//	public function ordenar()
//	{
//            $entityManager = $this->getDoctrine()->getManager();
//			$proyecto = $entityManager->getRepository(Proyecto::class)->findOneBy(['nombre'=>'Proyecto huella animal']);
//			echo $proyecto->getNombre()."<br>";
//
//			$proyecto = $entityManager->getRepository(Proyecto::class)->findBy(['nombre'=>'Proyecto huella animal']);
//			for ($i=0; $i<count($proyecto); $i++){
//				echo $proyecto[$i]->getNombre()."<br>";
//			}
//							
//				die();
//		return new Response(
//           '<html><body> order </body></html>'
//       );
//	}


    /**
     * @Route("/number/{max}", name="app_lucky_number")
     */
    public function number($max)
    {
        $number = random_int(0, $max);
            $entityManager = $this->getDoctrine()->getManager();
//			$proyecto = $entityManager->getRepository(Proyecto::class)->findOneBy(['nombre'=>'Proyecto huella animal']);
//			echo $proyecto->getNombre()."<br>";

			$proyecto = $entityManager->getRepository(Proyecto::class)->findBy(['nombre'=>'Proyecto huella animal']);
			for ($i=0; $i<count($proyecto); $i++){
				echo $proyecto[$i]->getNombre()."<br>".$proyecto[$i]->getTematica();
			}
							
				die();
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }





}
