<?php
// src/Controller/HomeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'title' => 'SAE Portfolio',
            'sections' => [
                'hero' => [
                    'name' => 'DA BOIT',
                    'title' => 'Etudiant R&T',
                    'description' => 'Passionné par la création d\'applications web modernes',
                ],
                'about' => [
                    'bio' => 'Description professionnelle...',
                    'skills' => ['Symfony', 'PHP', 'JavaScript', 'MySQL', 'Git'],
                ],
            ],
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig', [
            'title' => 'À propos',
        ]);
    }

    #[Route('/projects', name: 'app_projects')]
    public function projects(): Response
    {
        // Récupérer les projets depuis la base de données
        $projects = [
            [
                'id' => 1,
                'title' => 'Projet E-commerce',
                'description' => 'Plateforme de vente en ligne',
                'technologies' => ['Symfony', 'MySQL', 'Bootstrap'],
                'image' => 'project1.jpg',
                'url' => 'https://example.com',
            ],
            // Ajouter d'autres projets
        ];

        return $this->render('home/projects.html.twig', [
            'title' => 'Mes Projets',
            'projects' => $projects,
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', [
            'title' => 'Contact',
        ]);
    }
}