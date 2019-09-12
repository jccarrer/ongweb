<?php

namespace App\Controller;

use App\Entity\Osc;
use App\Form\OscType;
use App\Repository\OscRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("admin/osc")
 */
class OscController extends AbstractController
{
    /**
     * @Route("/", name="osc_index", methods={"GET"})
     */
    public function index(OscRepository $oscRepository, PaginatorInterface $paginator,Request $request): Response
    {
        $alloscs = $oscRepository->findAll();
		
		
		// Paginate the results of the query
        $oscs = $paginator->paginate(
            // Doctrine Query, not results
            $alloscs,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            3
        );
		
		return $this->render('osc/index.html.twig', [
            'oscs' => $oscs,
        ]);
    }

    /**
     * @Route("/new", name="osc_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $osc = new Osc();
        $form = $this->createForm(OscType::class, $osc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

			$file = $request->files->get('osc')['estatutos'];
			$upload_directory = $this->getParameter('uploads_directory');
			$filename = md5(uniqid()) .'.'. $file->guessExtension();

			$file->move(
				$upload_directory,
				$filename
			);


			$file2 = $request->files->get('osc')['cta_bancaria'];
			$upload_directory = $this->getParameter('uploads_directory');
			$filename2 = md5(uniqid()) .'.'. $file2->guessExtension();

			$file2->move(
				$upload_directory,
				$filename2
			);


			$file3 = $request->files->get('osc')['ci_representante'];
			$upload_directory = $this->getParameter('uploads_directory');
			$filename3 = md5(uniqid()) .'.'. $file3->guessExtension();

			$file3->move(
				$upload_directory,
				$filename3
			);


			$file4 = $request->files->get('osc')['ci_uafe'];
			$upload_directory = $this->getParameter('uploads_directory');
			$filename4 = md5(uniqid()) .'.'. $file4->guessExtension();

			$file4->move(
				$upload_directory,
				$filename4
			);




			$osc->setEstatutos($filename);
			$osc->setCtaBancaria($filename2);
			$osc->setCiRepresentante($filename3);
			$osc->setCiUafe($filename4);



            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($osc);
            $entityManager->flush();

            return $this->redirectToRoute('osc_index');
        }

        return $this->render('osc/new.html.twig', [
            'osc' => $osc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="osc_show", methods={"GET"})
     */
    public function show(Osc $osc): Response
    {
        return $this->render('osc/show.html.twig', [
            'osc' => $osc,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="osc_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Osc $osc): Response
    {
        $form = $this->createForm(OscType::class, $osc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('osc_index', [
                'id' => $osc->getId(),
            ]);
        }

        return $this->render('osc/edit.html.twig', [
            'osc' => $osc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="osc_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Osc $osc): Response
    {
        if ($this->isCsrfTokenValid('delete'.$osc->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($osc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('osc_index');
    }
}
