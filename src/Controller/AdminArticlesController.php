<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminArticlesController extends EasyAdminController
{
    /**
     * @Route("/admin/articles", name="admin_articles")
     */
    public function index()
    {
        return $this->render('admin_articles/index.html.twig', [
            'controller_name' => 'AdminArticlesController',
        ]);
    }
}
