<?php

namespace App\Controller;

use App\Entity\Projets;
use App\Repository\ProjetsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjetsController extends AbstractController
{
    /**
     * Permet de retourner les 2 dernier projets sur la page d'accueil
     * 
     * @Route("/projets/index", name="projets")
     * 
     * @param ProjetsRepository $projetsRepository
     */
    public function index(ProjetsRepository $projetsRepository)
    {
        $homeProjectList = $projetsRepository->findProjets(2, 0);
        
        return $this->render('projets/index.html.twig', [
            'projets' => $homeProjectList,
        ]);
    }

    /**
     * Permet d'afficher une seule annonce grace au paramConverter passé dans les paramêtre de la fonction
     * 
     * @Route("/projets/{slug}", name="projets_show")
     *
     * @return Response
     */
    public function singleProjet(Projets $projets)
    {
        return $this->render('projets/singleProjet.html.twig', [
            'projets' => $projets,
        ]);
    }
}
