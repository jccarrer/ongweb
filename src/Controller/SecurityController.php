<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
#use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use Symfony\Component\HttpFoundation\Response;


use App\Entity\Proyecto;

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
     * @Route("/{id}", name="usuario_proyecto_show", methods={"GET"})
     */
    public function show(Proyecto $proyecto, CargosProyectoRepository $cargosProyectoRepository,
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

}
