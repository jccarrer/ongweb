<?php

namespace App\Controller;

use App\Entity\Osc;
use App\Form\OscType;
use App\Repository\OscRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/osc")
 */
class OscController extends AbstractController
{
    /**
     * @Route("/", name="osc_index", methods={"GET"})
     */
    public function index(OscRepository $oscRepository): Response
    {
        return $this->render('osc/index.html.twig', [
            'oscs' => $oscRepository->findAll(),
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
