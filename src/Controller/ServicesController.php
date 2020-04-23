<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services", name="services")
     */
    public function index(ServicesRepository $servicesRepository)
    {
        return $this->render('services/index.html.twig', [
            'services' => $servicesRepository->findAll(),
        ]);
    }
}
