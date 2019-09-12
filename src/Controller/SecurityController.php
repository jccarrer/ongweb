<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
#use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Component\HttpFoundation\Response;


use App\Entity\Proyecto;
use App\Entity\Actividades;

use App\Repository\DocumentosVerificacionRepository;
use App\Repository\ActividadesRepository;
use App\Repository\IndicadoresRepository;
use App\Repository\ResultadosRepository;
use App\Repository\CargosProyectoRepository;
use App\Repository\CargosRepository;
use App\Repository\BeneficiariosRepository;
use App\Repository\UserRepository;
use App\Repository\ProyectoRepository;
use App\Repository\OscRepository;


use App\Entity\Beneficiarios;
use App\Form\BeneficiariosType;

// Include paginator interface
use Knp\Component\Pager\PaginatorInterface;



class SecurityController extends AbstractController
{
    /**
     * @Route("/", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils,
	DocumentosVerificacionRepository $documentosVerificacionRepository,
	ActividadesRepository $actividadesRepository, IndicadoresRepository $indicadoresRepository,
	ResultadosRepository $resultadosRepository,CargosProyectoRepository $cargosProyectoRepository,
	CargosRepository $cargosRepository, BeneficiariosRepository $beneficiariosRepository,
	UserRepository $userRepository, ProyectoRepository $proyectoRepository,
	OscRepository $oscRepository): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
			'documentos_verificacions' => $documentosVerificacionRepository->findAll(),
			'actividades' => $actividadesRepository->findAll(),
			'indicadores' => $indicadoresRepository->findAll(),
			'resultados' => $resultadosRepository->findAll(),
			'cargos_proyectos' => $cargosProyectoRepository->findAll(),
			'cargos' => $cargosRepository->findAll(),
			'beneficiarios' => $beneficiariosRepository->findAll(),
            'users' => $userRepository->findAll(),
			'proyectos' => $proyectoRepository->findAll(),
			'oscs' => $oscRepository->findAll(),
        ));
    }





    /**
     * @Route("/user/{id}", name="usuario_proyecto_show", methods={"GET"})
     */
    public function show_usuario(Proyecto $proyecto, CargosProyectoRepository $cargosProyectoRepository,
	ActividadesRepository $actividadesRepository, IndicadoresRepository $indicadoresRepository,
	ResultadosRepository $resultadosRepository): Response
    {
        return $this->render('security/user_proyecto.html.twig', [
            'proyecto' => $proyecto,
			'cargos_proyectos' => $cargosProyectoRepository->findAll(),
			'actividades' => $actividadesRepository->findAll(),
			'indicadores' => $indicadoresRepository->findAll(),
			'resultados' => $resultadosRepository->findAll(),
        ]);
    }





    /**
     * @Route("/user/{id}/beneficiarios", name="beneficiarios_actividades_show", methods={"GET"})
     */
    public function show_usuario_beneficiarios(Actividades $actividad, CargosProyectoRepository $cargosProyectoRepository,
	ActividadesRepository $actividadesRepository, IndicadoresRepository $indicadoresRepository,
	ResultadosRepository $resultadosRepository, BeneficiariosRepository $beneficiariosRepository,
	Request $request): Response
    {	






        return $this->render('security/beneficiarios_proyecto.html.twig', [
            'actividad' => $actividad,
			'cargos_proyectos' => $cargosProyectoRepository->findAll(),
			'actividades' => $actividadesRepository->findAll(),
			'indicadores' => $indicadoresRepository->findAll(),
			'resultados' => $resultadosRepository->findAll(),
			'beneficiarios' =>  $beneficiariosRepository->findAll(),
        ]);
    }





    /**
     * @Route("/user/beneficiarios/{id}/new", name="beneficiarios_actividades_new", methods={"GET","POST"})
     */
    public function show_usuario_beneficiarios_new(Request $request,Actividades $actividad, CargosProyectoRepository $cargosProyectoRepository,
	ActividadesRepository $actividadesRepository, IndicadoresRepository $indicadoresRepository,
	ResultadosRepository $resultadosRepository, BeneficiariosRepository $beneficiariosRepository): Response
    {
        $beneficiario = new Beneficiarios();
        $form = $this->createForm(BeneficiariosType::class, $beneficiario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($beneficiario);
            $entityManager->flush();

           return $this->redirectToRoute('beneficiarios_actividades_show', [
                'id' => $actividad->getId(),
            ]);
        }
		





        return $this->render('security/beneficiarios_proyecto_new.html.twig', [
            'beneficiario' => $beneficiario,
            'form' => $form->createView(),			
			'actividad' => $actividad,
			'cargos_proyectos' => $cargosProyectoRepository->findAll(),
			'actividades' => $actividadesRepository->findAll(),
			'indicadores' => $indicadoresRepository->findAll(),
			'resultados' => $resultadosRepository->findAll(),
			'beneficiarios' => $beneficiariosRepository->findAll(),
        ]);
    }






}
