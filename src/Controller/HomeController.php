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
            'title' => 'DA BOIT - Portfolio',
            'hero' => [
                'name' => 'DA BOIT',
                'firstname' => 'Maxence',
                'title' => 'Etudiant R&T',
                'subtitle' => 'IUT de Roanne',
            ],
            'university' => [
                'name' => 'IUT de Roanne',
                'full_name' => 'Université Jean Monnet',
            ],
            'technologies' => [
                ['name' => 'Cisco', 'image' => 'cisco.png'],
                ['name' => 'C', 'image' => 'c.png'],
                ['name' => 'Python', 'image' => 'python.png'],
                ['name' => 'Symfony', 'image' => 'symfony.png'],
                ['name' => 'HTML', 'image' => 'html.png'],
                ['name' => 'CSS', 'image' => 'css.png'],
                ['name' => 'Ubuntu', 'image' => 'ubuntu.png'],
            ],
            'projects' => [
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
                    'title' => 'RT3 - Créer des outils et des applications informatiques pour les R&T',
                    'description' => 'Développement d\'applications web pour la gestion réseau.',
                    'gradient' => 'gradient-3',
                ],
            ],
            'about' => [
                'title' => 'Introduction',
                'paragraphs' => [
                    'A little paragraph introducing your guest. A sense of them just, why we are, where they are in life, what they bring, whatever you want to do.',
                    'Another paragraph about them, more specifically about their beliefs and things they want to do.',
                ],
            ],
            'interests' => [
                'title' => 'Centres d\'intérêt et loisirs',
                'description' => 'A little segment to reveal out the afterschool aspects of this webpage. When the person listed is really? What do they then, and what they like? You can go a little thought because this too, for if you want to.',
                'cards' => [
                    ['gradient' => 'gradient-1'],
                    ['gradient' => 'gradient-2'],
                    ['gradient' => 'gradient-3'],
                ],
            ],
            'education' => [
                [
                    'title' => 'Menuiserie',
                    'year' => '2020',
                ],
                [
                    'title' => 'Bac Pro SEN',
                    'year' => '2019',
                ],
            ],
            'social' => [
                ['name' => 'Instagram', 'icon' => 'fab fa-instagram', 'url' => '#'],
                ['name' => 'LinkedIn', 'icon' => 'fab fa-linkedin', 'url' => '#'],
                ['name' => 'Email', 'icon' => 'fas fa-envelope', 'url' => 'mailto:votre@email.com'],
                ['name' => 'GitHub', 'icon' => 'fab fa-github', 'url' => '#'],
            ],
        ]);
    }

    #[Route('/project/{id}', name: 'app_project_detail')]
    public function projectDetail(int $id): Response
    {
        // Récupérer tous les projets
        $allProjects = [
            1 => [
                'id' => 1,
                'title' => 'RT1 - Administrer les réseaux et l\'Internet',
                'description' => 'Configuration et administration de réseaux d\'entreprise.',
                'gradient' => 'gradient-1',
                'full_description' => 'Ce projet porte sur l\'administration complète des réseaux et de l\'Internet. J\'ai mis en place des infrastructures réseau robustes, configuré des équipements Cisco, et assuré la sécurité des systèmes. Le projet inclut la gestion de VLANs, le routage inter-VLAN, la configuration de protocoles de routage dynamique (OSPF, RIP), et l\'implémentation de solutions de sécurité réseau.',
                'technologies' => ['Cisco Packet Tracer', 'Wireshark', 'Linux', 'GNS3', 'VLAN', 'OSPF'],
                'date' => 'Septembre 2024 - Décembre 2024',
                'duration' => '3 mois',
                'images' => [],
                'challenges' => [
                    'Configuration de réseaux complexes avec plusieurs VLANs',
                    'Sécurisation des infrastructures contre les attaques courantes',
                    'Optimisation des performances réseau et réduction de la latence',
                    'Documentation technique complète pour la maintenance',
                ],
                'results' => [
                    'Réseau opérationnel avec 99.9% de disponibilité',
                    'Réduction de 30% des incidents réseau grâce à la surveillance proactive',
                    'Documentation complète livrée pour faciliter la maintenance',
                    'Mise en place réussie de politiques de sécurité conformes aux standards',
                ],
            ],
            2 => [
                'id' => 2,
                'title' => 'RT2 - Connecter les entreprises et les usagers',
                'description' => 'Mise en place de solutions de connectivité réseau.',
                'gradient' => 'gradient-2',
                'full_description' => 'Ce projet se concentre sur la création de solutions permettant de connecter efficacement les entreprises et leurs usagers. J\'ai développé des systèmes de communication sécurisés, mis en place des VPN pour les connexions distantes, et configuré des services réseau essentiels. Le projet inclut également l\'optimisation des connexions et la gestion de la qualité de service (QoS).',
                'technologies' => ['Python', 'PHP', 'JavaScript', 'API REST', 'VPN', 'DNS/DHCP'],
                'date' => 'Janvier 2024 - Mars 2024',
                'duration' => '2 mois',
                'images' => [],
                'challenges' => [
                    'Intégration de systèmes hétérogènes',
                    'Garantir la sécurité des connexions distantes',
                    'Optimisation de la bande passante pour de nombreux utilisateurs simultanés',
                    'Gestion des pics de charge et haute disponibilité',
                ],
                'results' => [
                    'Solution VPN déployée pour 100+ utilisateurs distants',
                    'Amélioration de 40% des temps de réponse des services',
                    'Système de monitoring en temps réel opérationnel',
                    'Satisfaction utilisateur de 95% selon les enquêtes',
                ],
            ],
            3 => [
                'id' => 3,
                'title' => 'RT3 - Créer des outils et des applications informatiques pour les R&T',
                'description' => 'Développement d\'applications web pour la gestion réseau.',
                'gradient' => 'gradient-3',
                'full_description' => 'Ce projet consiste en la création d\'outils et d\'applications informatiques spécialement conçus pour les Réseaux et Télécommunications. J\'ai développé une application web complète utilisant Symfony pour la gestion et le monitoring des équipements réseau. L\'application permet de visualiser l\'état du réseau en temps réel, de gérer les incidents, et de générer des rapports automatiques.',
                'technologies' => ['Symfony', 'PHP', 'MySQL', 'HTML5', 'CSS3', 'JavaScript', 'Bootstrap'],
                'date' => 'Mars 2024 - Juin 2024',
                'duration' => '4 mois',
                'images' => [],
                'challenges' => [
                    'Apprentissage du framework Symfony en autonomie',
                    'Gestion d\'une base de données complexe avec relations multiples',
                    'Création d\'une interface utilisateur intuitive et responsive',
                    'Implémentation de la sécurité et de l\'authentification',
                ],
                'results' => [
                    'Application web complète et fonctionnelle déployée',
                    'Réduction de 50% du temps de gestion des incidents réseau',
                    'Interface responsive accessible sur tous les appareils',
                    'Code propre et documenté facilitant la maintenance future',
                ],
            ],
        ];

        // Vérifier si le projet existe
        if (!isset($allProjects[$id])) {
            throw $this->createNotFoundException('Le projet n\'existe pas');
        }

        $project = $allProjects[$id];

        return $this->render('home/project_detail.html.twig', [
            'title' => $project['title'],
            'project' => $project,
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
        $projects = [
            [
                'id' => 1,
                'title' => 'RT1 - Administrer les réseaux et l\'Internet',
                'description' => 'Mise en place et configuration de réseaux d\'entreprise',
                'technologies' => ['Cisco', 'Packet Tracer', 'Wireshark'],
                'image' => 'project1.jpg',
                'url' => '#',
            ],
            [
                'id' => 2,
                'title' => 'RT2 - Connecter les entreprises et les usagers',
                'description' => 'Déploiement de solutions de connectivité',
                'technologies' => ['Python', 'PHP', 'JavaScript'],
                'image' => 'project2.jpg',
                'url' => '#',
            ],
            [
                'id' => 3,
                'title' => 'RT3 - Créer des outils informatiques',
                'description' => 'Développement d\'applications web',
                'technologies' => ['Symfony', 'HTML', 'CSS'],
                'image' => 'project3.jpg',
                'url' => '#',
            ],
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
            'email' => 'votre@email.com',
            'phone' => '+33 X XX XX XX XX',
        ]);
    }
}