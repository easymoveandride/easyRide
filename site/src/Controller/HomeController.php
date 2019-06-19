<?php

namespace App\Controller;


use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class HomeController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/home", name="home.index")
     */
    public function index()
    {
        return ['message' => 'Home page'];
    }
}
