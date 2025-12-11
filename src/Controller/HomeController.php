<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    // --- DONNÉES DES PROJETS (Gardées intactes) ---
    private function getProjects(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'RT1 - Administrer les réseaux',
                'description' => 'Configuration et administration de réseaux d\'entreprise (VLAN, Routage, etc.).',
                'full_description' => 'Ce projet consistait à concevoir et déployer une architecture réseau complète pour une PME fictive. Il a fallu configurer les équipements actifs (switchs, routeurs) pour assurer la segmentation via des VLANs et la sécurité des accès.',
                'date' => 'Septembre 2023',
                'duration' => '4 mois',
                'gradient' => 'gradient-1',
                'imageFilename' => 'cisco.png',
                'technologies' => ['Cisco IOS', 'VLAN', 'OSPF', 'Wireshark'],
                'challenges' => [
                    'Mise en place du routage inter-VLAN sans perte de paquets.',
                    'Sécurisation des accès SSH sur les équipements.',
                    'Débogage des tables ARP lors des tests de connectivité.'
                ],
                'results' => [
                    'Architecture réseau stable et redondante.',
                    'Documentation technique complète remise au client.',
                    'Note de 18/20 obtenue lors de la soutenance.'
                ]
            ],
            [
                'id' => 2,
                'title' => 'RT2 - Connecter les entreprises',
                'description' => 'Mise en place de solutions de connectivité et de télécommunication.',
                'full_description' => 'L\'objectif était d\'interconnecter deux sites distants via un tunnel VPN sécurisé et de mettre en place des services réseaux essentiels (DNS, DHCP, Web) sous environnement Linux.',
                'date' => 'Janvier 2024',
                'duration' => '3 mois',
                'gradient' => 'gradient-2',
                'imageFilename' => 'ubuntu.png',
                'technologies' => ['Linux (Ubuntu)', 'Apache', 'OpenVPN', 'Bind9'],
                'challenges' => [
                    'Configuration correcte des zones DNS directes et inverses.',
                    'Gestion des certificats SSL pour le serveur Web.',
                    'Configuration du pare-feu UFW pour n\'autoriser que le trafic légitime.'
                ],
                'results' => [
                    'Interconnexion des sites fonctionnelle à 100%.',
                    'Service Web accessible via nom de domaine interne.',
                    'Mise en place d\'un script de sauvegarde automatique.'
                ]
            ],
            [
                'id' => 3,
                'title' => 'RT3 - Développement d\'outils',
                'description' => 'Développement d\'applications web pour la gestion réseau.',
                'full_description' => 'Création d\'une interface web dynamique permettant aux administrateurs de visualiser l\'état du parc informatique. Utilisation du framework Symfony pour structurer le code selon le modèle MVC.',
                'date' => 'Avril 2024',
                'duration' => '2 mois',
                'gradient' => 'gradient-3',
                'imageFilename' => 'symfony.png',
                'technologies' => ['Symfony 7', 'PHP 8', 'Twig', 'Bootstrap', 'MySQL'],
                'challenges' => [
                    'Compréhension de la structure MVC de Symfony.',
                    'Création de relations complexes en base de données (ManyToOne).',
                    'Intégration d\'un design responsive avec CSS Grid.'
                ],
                'results' => [
                    'Site e-portfolio personnel mis en ligne.',
                    'Code propre et réutilisable.',
                    'Maîtrise des bases du développement Back-end.'
                ]
            ],
        ];
    }

    // --- ROUTES PRINCIPALES ---

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'projects' => $this->getProjects(),
            'groupe_tp' => 'TP-A2',
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

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig');
    }

    #[Route('/project/{id}', name: 'app_project_detail')]
    public function projectDetail(int $id): Response
    {
        $projects = $this->getProjects();
        $selectedProject = null;

        foreach ($projects as $p) {
            if ($p['id'] === $id) {
                $selectedProject = $p;
                break;
            }
        }

        if (!$selectedProject) {
            throw $this->createNotFoundException('Projet non trouvé !');
        }

        return $this->render('home/project_detail.html.twig', [
            'project' => $selectedProject,
        ]);
    }

    // --- NOUVELLES ROUTES PASSIONS ---

    /**
     * Le Hub des passions (La grille Bento)
     */
    #[Route('/passions', name: 'app_passions')]
    public function passions(): Response
    {
        // On pointe vers le nouveau template index des passions
        return $this->render('passions/index.html.twig');
    }

    /**
     * Page Détail : Japonais & Anki
     */
    #[Route('/passion/japanese', name: 'app_japanese')]
    public function japanese(): Response
    {
        return $this->render('home/japanese.html.twig');
    }

    /**
     * Page Détail : Unix / Linux Ricing
     */
    #[Route('/passion/linux', name: 'app_linux')]
    public function linux(): Response
    {
        return $this->render('home/linux.html.twig');
    }

    /**
     * Page Détail : Blender 3D
     */
    #[Route('/passion/blender', name: 'app_blender')]
    public function blender(): Response
    {
        return $this->render('home/blender.html.twig');
    }
}