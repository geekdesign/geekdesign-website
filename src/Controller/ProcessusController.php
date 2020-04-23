<?php

namespace App\Controller;

use App\Repository\ProcessusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProcessusController extends AbstractController
{
    /**
     * @Route("/processus/ligne1", name="processus1")
     */
    public function ligne1(ProcessusRepository $processusRepo)
    {
        return $this->render('processus/processusLigne1.html.twig', [
            'processus1' => $processusRepo->findProcessus(2, 0),
            'processus2' => $processusRepo->findProcessus(3, 2),
        ]);
    }

    /**
     * @Route("/processus/ligne2", name="processus2")
     */
    public function ligne2(ProcessusRepository $processusRepo)
    {
        return $this->render('processus/processusLigne2.html.twig', [
            'processus1' => $processusRepo->findProcessus(2, 0),
            'processus2' => $processusRepo->findProcessus(3, 2),
        ]);
    }
}
