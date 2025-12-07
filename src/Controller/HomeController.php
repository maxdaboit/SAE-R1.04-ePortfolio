<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private function getProjects(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'RT1 - Administrer les réseaux et l\'Internet',
                'description' => 'Configuration et administration de réseaux d\'entreprise.',
                'gradient' => 'gradient-1',
            ],
            [
                'id' => 2,
                'title' => 'RT2 - Connecter les entreprises et les usagers',
                'description' => 'Mise en place de solutions de connectivité réseau.',
                'gradient' => 'gradient-2',
            ],
            [
                'id' => 3,
                'title' => 'RT3 - Créer des outils et des applications informatiques',
                'description' => 'Développement d\'applications web pour la gestion réseau.',
                'gradient' => 'gradient-3',
            ],
        ];
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'projects' => $this->getProjects(),
            'groupe_tp' => 'B1',
        ]);
    }

    #[Route('/cv', name: 'app_cv')]
    public function cv(): Response
    {
        return $this->render('home/cv.html.twig');
    }

    #[Route('/eportfolio', name: 'app_eportfolio')]
    public function eportfolio(): Response
    {
        return $this->render('home/eportfolio.html.twig', [
            'projects' => $this->getProjects(),
        ]);
    }

    #[Route('/passions', name: 'app_passions')]
    public function passions(): Response
    {
        return $this->render('home/passions.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }

    #[Route('/project/{id}', name: 'app_project_detail')]
    public function projectDetail(int $id): Response
    {
        // Gardez votre code existant pour project_detail
        return $this->render('home/project_detail.html.twig', [
            'project' => [], // Votre logique existante
        ]);
    }
}