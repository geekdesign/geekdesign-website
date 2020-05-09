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
        $post = $repo->findArticles(999, 0);
        $blocks = $block->findAll(); 
        $pages = $page->findOneBy(array('slug' => 'blog'));
        
        return $this->render('articles/index.html.twig', [
            'page' => $pages,
            'blocks' => $blocks,
            'posts' => $post,
        ]);
    }
}
