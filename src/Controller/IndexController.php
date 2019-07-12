<?php
// src/Controller/IndexController.php
namespace App\Controller;

use Symfony\Bunle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;



class IndexController extends AbstractController
{

    public function homepage()
    {
        /**
         * @Route("/")
         */
        return new Response('<html><body>Hi, i am the home page </body></html>');
    }
 
   
    
    public function adminpage()
    {
        /**
         * @Route("/admin")
         */ 
        
        $comments = [
            'holix1','holix2','holix3'
        ];         

        
        
        return $this->render('adminpages/home.html.twig',[
            'title' => ucwords('notitle'),
            'comments' => $comments,
        ]);
        
       
    }
}