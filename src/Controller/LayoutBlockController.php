<?php

namespace App\Controller;

use App\Entity\Block;
use App\Repository\BlockRepository;
use App\Repository\LayoutBlockRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LayoutBlockController extends AbstractController
{
    /**
     * @Route("/layout/block", name="layout_block")
     */
    public function index(LayoutBlockRepository $repo, Block $blocks)
    {   

        $items = $repo->findAll();
        $layoutArray = array();
        
        foreach($items as $item)
        { 
            $layoutItem = $item->getCamelName();
            array_push($layoutArray, $layoutItem);
        }
        
        foreach ($layoutArray as $layout) {
            $filename = "layoutBlock/".$layout.".html.twig";
            if (file_exists($filename)) {
                return $this->render($filename, [
                    'bloc' => $blocks,
                    'layouts' => 'merde',
                ]);
            }else{
                return $this->render("layoutBlock/standardBackgroundColor.html.twig", [
                    'block' => $blocks,
                    'layouts' => 'merde',
                ]);
            }
        }

    }
}
