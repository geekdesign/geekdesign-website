<?php

namespace App\Controller;

use App\Form\ContactType;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\BlockRepository;
use App\Repository\PagesRepository;
use App\Repository\ProjetsRepository;
use App\Repository\ServicesRepository;
use App\Repository\ProcessusRepository;
use App\Repository\LayoutBlockRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request,\Swift_Mailer $mailer,PagesRepository $page, LayoutBlockRepository $layout, BlockRepository $block, ProcessusRepository $processusRepo, ServicesRepository $servicesRepository, ProjetsRepository $projetsRepository)
    {
        $homepage = $page->findOneBy(array('slug' => 'home')); 
        $blocks = $block->findAll(); 
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contact = $form->getData();
            //Ici nous envérons le mail
            $message = (new \Swift_Message('Demande sur GeekDesign'))
                    ->setFrom($contact['email'])
                    ->setTo('schutz.pa@gmail.com')
                    ->setReplyTo($contact['email'])
                    ->setBody(
                        $this->renderView(
                            'emails/contact.html.twig', compact('contact')
                        ),
                        'text/html'
                        )
            ;
                        
            $mailer->send($message);

            unset($form);
            $form = $this->createForm(ContactType::class);

            $this->addFlash('message', "Le message a bien été envoyé, je vous contacterez trés bientôt !");

        }

        return $this->render('home/index.html.twig', [
            'page' => $homepage,
            'blocks' => $blocks,
            'processus1' => $processusRepo->findProcessus(2, 0),
            'processus2' => $processusRepo->findProcessus(3, 2),
            'services' => $servicesRepository->findAll(),
            'projets' => $projetsRepository->findProjets(2, 0),
            'contactform' => $form->createView(),
        ]);
    }
}
