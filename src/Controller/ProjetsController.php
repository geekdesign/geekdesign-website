<?php

namespace App\Controller;

use App\Repository\ProjetsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProjetsController extends AbstractController
{
    /**
     * @Route("/projets", name="projets")
     */
    public function index(ProjetsRepository $projetsRepository)
    {
        return $this->render('projets/index.html.twig', [
            'projets' => $projetsRepository->findProjets(2, 0),
        ]);
    }
}
