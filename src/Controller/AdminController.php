<?php

// src/Controller/AdminController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class AdminController extends EasyAdminController
{
     /** 
      * @Route("/admin", name="easyadmin") 
     */
     public function index(Request $request)
     {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
     }
}

