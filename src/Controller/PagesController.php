<?php

namespace App\Controller;

use App\Entity\Pages;
use App\Repository\BlockRepository;
use App\Repository\LayoutBlockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    /**
     * @Route("/pages", name="pages")
     */
    public function index()
    {
        return $this->render('pages/index.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }

    /**
     * @Route("/page/{slug}", name="pages_show")
     */
    public function show(Pages $page, LayoutBlockRepository $layout, BlockRepository $block)
    {
        $blocks = $block->findAll(); 

        return $this->render('pages/singlePage.html.twig', [
            'page' => $page,
            'blocks' => $blocks,
        ]);
    }
}
