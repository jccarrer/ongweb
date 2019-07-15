<?php
// src/Controller/IndexController.php
namespace App\Controller;



use Symfony\Component\Routing\Annotation\Route;
#use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }
    
    
    /**
     * @Route("/login2", name="login2")
     */    
    public function loginpage2()
    {
               return $this->render('adminpages/login.html.twig');
    }  
    
    
    /**
     * @Route("/admin", name="admin")
     */ 
    public function adminpage()
    {    
        $comments = [
            'holix1','holix2','holix3'
        ];         

        
        
        return $this->render('adminpages/admin.html.twig',[
            'title' => ucwords('notitle'),
            'comments' => $comments,
        ]);
        
       
    }
}