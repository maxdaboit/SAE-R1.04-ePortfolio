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
    #[Route('/passion/{id}', name: 'app_passion_detail')]
public function passionDetail(int $id): Response
{
    $passions = [
        1 => [
            'id' => 1,
            'title' => 'Technologie & Innovation',
            'gradient' => 'gradient-1',
            'description' => 'Ma passion pour la technologie et l\'innovation me pousse à explorer constamment les dernières avancées en matière de réseaux, cybersécurité et systèmes informatiques.',
            'content' => [
                'Je suis fasciné par l\'évolution rapide des technologies réseau et leur impact sur notre quotidien.',
                'Je passe beaucoup de temps à me former sur les nouvelles solutions de cybersécurité et les architectures réseau modernes.',
                'La veille technologique fait partie intégrante de ma routine pour rester à jour dans ce domaine en constante évolution.',
            ],
            'skills' => ['Réseaux', 'Cybersécurité', 'Cloud Computing', 'IoT'],
        ],
        2 => [
            'id' => 2,
            'title' => 'Développement Web',
            'gradient' => 'gradient-2',
            'description' => 'Le développement web est une passion qui me permet d\'allier créativité et compétences techniques pour créer des applications modernes et intuitives.',
            'content' => [
                'J\'apprécie particulièrement le développement full-stack avec Symfony et les frameworks JavaScript modernes.',
                'La création d\'interfaces utilisateur responsive et accessibles est un défi que je relève avec plaisir.',
                'Chaque projet est une opportunité d\'apprendre de nouvelles techniques et d\'améliorer mes compétences.',
            ],
            'skills' => ['Symfony', 'PHP', 'JavaScript', 'HTML/CSS', 'Bootstrap'],
        ],
        3 => [
            'id' => 3,
            'title' => 'Menuiserie',
            'gradient' => 'gradient-3',
            'description' => 'La menuiserie est mon hobby créatif qui me permet de travailler de mes mains et de créer des objets concrets et durables.',
            'content' => [
                'Cette passion complémentaire à l\'informatique me permet de garder un équilibre et de développer ma créativité.',
                'J\'aime la précision et la patience qu\'exige le travail du bois, des qualités transférables à mon métier de technicien réseau.',
                'Créer quelque chose de tangible est extrêmement satisfaisant et me permet de déconnecter du monde numérique.',
            ],
            'skills' => ['Travail du bois', 'Précision', 'Créativité', 'Patience'],
        ],
    ];

    if (!isset($passions[$id])) {
        throw $this->createNotFoundException('Cette passion n\'existe pas');
    }

    return $this->render('home/passion_detail.html.twig', [
        'passion' => $passions[$id],
    ]);
}



}