<?php

namespace App\Controller;

use App\Form\ContactType; // <-- à créer juste après (voir section 2)
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * Simule une base de données pour les projets
     */
    private function getProjects(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Administration Réseaux (Cisco)',
                'category' => 'SAE 2.01',
                'description' => 'Conception d\'une architecture réseau pour une PME (VLAN, Routage OSPF).',
                'full_description' => 'Dans le cadre de la SAE 2.01, j\'ai dû concevoir l\'architecture complète d\'un réseau d\'entreprise. L\'objectif était de segmenter les services via des VLANs et d\'assurer la redondance.',
                'date' => 'Semestre 2',
                'duration' => 'SAE',
                'gradient' => 'gradient-1',
                'imageFilename' => 'cisco.png',
                'technologies' => ['Cisco Packet Tracer', 'VLAN', 'OSPF', 'Wireshark'],
                'challenges' => [
                    'Routage inter-VLAN complexe.',
                    'Respect du cahier des charges strict.',
                    'Configuration des ACLs.'
                ],
                'results' => [
                    'Maquette fonctionnelle à 100%.',
                    'Dossier technique validé par l\'enseignant.',
                    'Note obtenue : 16/20.'
                ]
            ],
            [
                'id' => 2,
                'title' => 'Services Réseaux Linux',
                'category' => 'TP Avancé',
                'description' => 'Mise en place de services DNS, DHCP et Web sous Ubuntu Server.',
                'full_description' => 'Durant ce cycle de Travaux Pratiques, nous avons déployé des services critiques sur des machines virtuelles Linux. L\'accent était mis sur la sécurité et l\'automatisation.',
                'date' => 'Semestre 3',
                'duration' => '4 Séances',
                'gradient' => 'gradient-2',
                'imageFilename' => 'ubuntu.png',
                'technologies' => ['Linux', 'Bind9 (DNS)', 'Apache', 'Bash'],
                'challenges' => [
                    'Configuration manuelle des fichiers de zone DNS.',
                    'Interconnexion des VMs.',
                    'Scripting Bash pour l\'automatisation.'
                ],
                'results' => [
                    'Serveurs opérationnels.',
                    'Compréhension approfondie du protocole DNS.',
                    'Validation des acquis techniques.'
                ]
            ],
            [
                'id' => 3,
                'title' => 'Développement Portfolio',
                'category' => 'SAE 1.04',
                'description' => 'Création d\'un site web dynamique en PHP/Symfony pour présenter mes compétences.',
                'full_description' => 'Cette SAE visait à nous initier au développement Web backend. J\'ai choisi d\'utiliser le framework Symfony pour structurer mon code et apprendre l\'architecture MVC.',
                'date' => 'Semestre 2',
                'duration' => 'SAE',
                'gradient' => 'gradient-3',
                'imageFilename' => 'symfony.png',
                'technologies' => ['Symfony', 'Twig', 'Bootstrap', 'Git'],
                'challenges' => [
                    'Apprentissage du framework Symfony.',
                    'Gestion des routes et des contrôleurs.',
                    'Design responsive.'
                ],
                'results' => [
                    'Site en ligne et fonctionnel.',
                    'Compétence validée en développement Web.',
                    'Base solide pour mon avenir pro.'
                ]
            ],
        ];
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'projects' => $this->getProjects(),
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
public function contact(Request $request): Response
{
    $form = $this->createForm(ContactType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $pdfPath = $this->getParameter('kernel.project_dir').'/public/cv_daboit.pdf';

        // 1) on crée la réponse de fichier
        $response = $this->file(
            $pdfPath,
            'CV_DA_BOIT_Maxence.pdf',
            ResponseHeaderBag::DISPOSITION_ATTACHMENT
        );

        // 2) on ajuste éventuellement le header sur CETTE réponse
        $response->headers->set('Content-Type', 'application/pdf');

        // 3) on renvoie bien un objet Response
        return $response;
    }

    // 3) afficher le formulaire
    return $this->render('home/contact.html.twig', [
        'form' => $form->createView(),
    ]);
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
            throw $this->createNotFoundException('Réalisation non trouvée !');
        }

        return $this->render('home/project_detail.html.twig', [
            'project' => $selectedProject,
        ]);
    }

    // --- ROUTES PASSIONS ---

    #[Route('/passions', name: 'app_passions')]
    public function passions(): Response
    {
        return $this->render('home/passions/index.html.twig');
    }

    #[Route('/passion/japanese', name: 'app_japanese')]
    public function japanese(): Response
    {
        return $this->render('home/passions/japanese.html.twig');
    }

    #[Route('/passion/linux', name: 'app_linux')]
    public function linux(): Response
    {
        return $this->render('home/passions/linux.html.twig');
    }
}
