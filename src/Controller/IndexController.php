<?php
// src/Controller/IndexController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function homepage()
    {
        /**
         * @Route("/")
         */

        return new Response(
            '<html><body>Hi, i am the home page </body></html>'
        );
    }
}