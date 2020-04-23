<?php

namespace App\Controller;

use App\Repository\BlockRepository;
use App\Repository\PagesRepository;
use App\Repository\ArticlesRepository;
use App\Repository\LayoutBlockRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(ArticlesRepository $repo, PagesRepository $page, LayoutBlockRepository $layout, BlockRepository $block)
    {
        $articles = $repo->findAll();
        $blocks = $block->findAll(); 
        $pages = $page->findAll(); 
        
        return $this->render('articles/index.html.twig', [
            'page' => $pages,
            'blocks' => $blocks,
            'articles' => $articles,
        ]);
    }
}
