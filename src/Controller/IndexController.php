<?php
// src/Controller/IndexController.php
namespace App\Controller;



use Symfony\Component\Routing\Annotation\Route;
#use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


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







class IndexController extends AbstractController
{

    
    
    /**
     * @Route("/user", name="login2")
     */    
    public function loginpage2()
    {
               return $this->render('content.html.twig');
    }  
    
    
    /**
     * @Route("/admin", name="admin")
     */ 
    public function adminpage(DocumentosVerificacionRepository $documentosVerificacionRepository,
	ActividadesRepository $actividadesRepository, IndicadoresRepository $indicadoresRepository,
	ResultadosRepository $resultadosRepository,CargosProyectoRepository $cargosProyectoRepository,
	CargosRepository $cargosRepository, BeneficiariosRepository $beneficiariosRepository,
	UserRepository $userRepository, ProyectoRepository $proyectoRepository,
	OscRepository $oscRepository): Response
    {    
        $comments = [
            'holix1','holix2','holix3'
        ];         

        

		
        
        return $this->render('adminpages/admin.html.twig',[
            'title' => ucwords('notitle'),
            'comments' => $comments,
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
        ]);
        
       
    }
}