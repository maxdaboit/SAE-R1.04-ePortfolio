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
                'category' => 'AC13.04',
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
            [
    'id' => 5,
    'title' => 'Installation d’un poste client Ubuntu LTS',
    'category' => 'AC11.06 / TP',
    'description' => 'Installation d’un poste client Ubuntu LTS dans une machine virtuelle VirtualBox et rédaction de la procédure détaillée.',
    'full_description' => 'Dans le cadre de l’AC11.06, j’ai installé un poste client Ubuntu LTS au sein d’une machine virtuelle VirtualBox. J’ai créé et configuré la VM, lancé l’installation du système, puis réalisé la configuration de base (mises à jour, réseau). Ce travail m’a permis de comprendre la mise en place d’un poste client Linux dans un environnement virtualisé et de documenter une procédure reproductible.',
    'date' => 'Semestre 1',
    'duration' => 'TP',
    'gradient' => 'gradient-2',
    'imageFilename' => 'ubuntu-virtualbox.png',
    'technologies' => ['VirtualBox', 'Ubuntu LTS', 'Linux'],
    'challenges' => [
        'Choisir des paramètres adaptés pour la machine virtuelle (RAM, disque).',
        'Comprendre les modes réseau de VirtualBox pour permettre l’accès Internet.',
        'Expliquer la procédure d’installation de manière claire et structurée.'
    ],
    'results' => [
        'Poste client Ubuntu LTS fonctionnel dans une VM VirtualBox.',
        'Accès réseau opérationnel pour mises à jour et navigation.',
        'Procédure d’installation rédigée et réutilisable pour d’autres postes.'
    ]
],

            [
    'id' => 4,
    'title' => 'Station de température et humidité',
    'category' => 'AC11.02 / TP',
    'description' => 'Réalisation d’une station de mesure température / humidité avec ESP32, DHT22, écran OLED et interface web.',
    'full_description' => 'TP de R106 visant à concevoir une station de surveillance de température et d’humidité basée sur un ESP32 et un capteur DHT22. Les données sont affichées sur un écran OLED SSD1306 et sur une page web servie par l’ESP32 en mode point d’accès WiFi. Une version avancée transforme le système en thermostat avec seuil configurable et pilotage d’un relais.',
    'date' => 'Semestre 1',
    'duration' => 'TP',
    'gradient' => 'gradient-4',
    'imageFilename' => 'esp32-dht22.png',
    'technologies' => ['ESP32', 'DHT22', 'OLED SSD1306', 'Arduino IDE', 'WiFi', 'HTML/CSS'],
    'challenges' => [
        'Lecture fiable du capteur DHT22 et gestion de son temps de réponse.',
        'Intégration de l’écran OLED SSD1306 avec affichage clair des mesures.',
        'Création d’un serveur web embarqué avec point d’accès WiFi sur l’ESP32.',
        'Mise en place d’un thermostat avec seuil et relais configurables depuis l’interface web.'
    ],
    'results' => [
        'Station fonctionnelle affichant température et humidité en local et via le web.',
        'Thermostat opérationnel pilotant un relais selon un seuil défini.',
        'Meilleure maîtrise des capteurs, de l’ESP32, du WiFi embarqué et du HTML/CSS simples.'
    ]
],
[
    'id' => 6,
    'title' => 'Devis matériel passif salle réseaux',
    'category' => 'AC12.05 / SAE 1.03',
    'description' => 'Élaboration d’un devis complet pour le renouvellement du matériel passif de la salle réseaux G007 du département RT.',
    'full_description' => 'Dans le cadre de la SAE 1.03, notre groupe a dû chiffrer un devis professionnel pour le renouvellement du matériel passif de la salle réseaux G007 : baie de brassage, panneaux, noyaux RJ45, câblage, goulottes, blocs bureaux et prises. En nous basant sur un cahier des charges et des références Legrand, nous avons estimé les quantités, les longueurs de câbles à partir du plan de la salle et la main-d’œuvre. Ce travail nous a permis de comprendre le processus complet d’élaboration d’un devis réseau réaliste et de le vendre à un client.',
    'date' => 'Semestre 1',
    'duration' => 'SAE',
    'gradient' => 'gradient-5',
    'imageFilename' => 'devis-sae103.png',
    'technologies' => ['Câblage structuré', 'Baie de brassage', 'RJ45 Cat6', 'Devis réseau'],
    'challenges' => [
        'Estimer les longueurs de câbles et goulottes à partir du plan de la salle.',
        'Choisir une baie de brassage et des accessoires compatibles et cohérents.',
        'Intégrer la main-d’œuvre et un forfait d’intervention dans un devis réaliste.'
    ],
    'results' => [
        'Devis complet au nom de l’entreprise fictive MatMaxTech.',
        'Total HT de 10 607,86 € et total TTC de 12 631,22 €.',
        'Meilleure compréhension du coût global d’une installation réseau passive.'
    ]
],
[
    'id' => 7,
    'title' => 'Partage de fichiers NFS/Samba et domaine Kerberos',
    'category' => 'AC11.03 / TP',
    'description' => 'Mise en place d’un serveur Linux de partage de fichiers (NFS/Samba) accessible depuis des clients Linux et Windows, avec domaine Kerberos.',
    'full_description' => 'Dans le cadre de l’AC11.03, j’ai configuré les fonctions de base d’un réseau local en déployant un serveur Linux offrant des partages de fichiers via NFS et Samba. Les postes clients Linux et Windows ont été intégrés à un domaine Kerberos, avec gestion des droits d’accès sur les répertoires partagés. Ce travail m’a permis de mettre en pratique l’administration à distance (SSH), la configuration de services réseau et la gestion des utilisateurs et permissions.',
    'date' => 'Semestre 1',
    'duration' => 'TP',
    'gradient' => 'gradient-1',
    'imageFilename' => 'ac1103-partage-fichiers.png',
    'technologies' => ['Linux', 'SSH', 'NFS', 'Samba', 'Kerberos', 'Réseau local'],
    'challenges' => [
        'Configurer correctement les interfaces et cartes réseau virtuelles pour le réseau interne.',
        'Résoudre les problèmes de pare-feu et de ports bloqués sur Windows.',
        'Corriger les problèmes de résolution DNS impactant les services Kerberos et Samba.'
    ],
    'results' => [
        'Serveur de partage de fichiers fonctionnel accessible depuis Linux et Windows.',
        'Domaine Kerberos opérationnel avec intégration de plusieurs machines.',
        'Meilleure maîtrise des services réseau de base et de la gestion des droits d’accès.'
    ]
],
[
    'id' => 8,
    'title' => 'Lois fondamentales de l’électricité et sécurité',
    'category' => 'AC11.01 / TD',
    'description' => 'Étude des lois électriques fondamentales et des règles de sécurité à appliquer lors d’interventions sur des équipements de réseaux.',
    'full_description' => 'Cette activité m’a permis d’apprendre les bases de l’électricité (lois de Ohm et de Joule) et les règles de sécurité nécessaires pour intervenir sur des équipements électriques et réseaux. J’ai étudié les pictogrammes normalisés, les risques liés au courant électrique et les procédures à suivre avant et pendant toute intervention. Cet apprentissage m’a sensibilisé à la rigueur et à la prévention de tout risque électrique.',
    'date' => 'Semestre 1',
    'duration' => 'Cours / TP',
    'gradient' => 'gradient-6',
    'imageFilename' => 'securite-electricite.png',
    'technologies' => ['Lois d’Ohm', 'Sécurité électrique', 'Normes NF', 'Pictogrammes', 'Multimètre'],
    'challenges' => [
        'Comprendre les effets du courant électrique et les lois fondamentales.',
        'Appliquer les protocoles de sécurité avant toute intervention.',
        'Reconnaître les logos et symboles normalisés de danger et d’interdiction.'
    ],
    'results' => [
        'Bonne compréhension des principes électriques de base.',
        'Application rigoureuse des gestes de sécurité en milieu technique.',
        'Sensibilisation au respect des normes et pictogrammes de prévention.'
    ]
],
[
    'id' => 9,
    'title' => 'Mesure et analyse des signaux Wi‑Fi EDUROAM',
    'category' => 'AC12.01 / SAE 1.03',
    'description' => 'Audit Wi‑Fi du réseau EDUROAM à l’IUT : mesures terrain des signaux radio et analyse de la qualité de couverture.',
    'full_description' => 'Dans le cadre de la SAE 1.03, utilisée comme support pour l’AC12.01, notre groupe a réalisé un audit Wi‑Fi du réseau EDUROAM sur plusieurs bâtiments de l’IUT. À l’aide d’un AirChecker, nous avons mesuré le signal strength, le niveau de bruit, le SNR et les canaux utilisés à différents emplacements. Nous avons ensuite établi un barème de qualification des signaux et synthétisé les résultats dans des tableaux afin d’identifier les zones bien couvertes et celles où la qualité de connexion est plus faible. Ce travail m’a permis de mettre en pratique la mesure et l’analyse de signaux radio Wi‑Fi.',
    'date' => 'Semestre 1',
    'duration' => 'SAE',
    'gradient' => 'gradient-3',
    'imageFilename' => 'audit-wifi-eduroam.png',
    'technologies' => ['Wi‑Fi', 'Mesure', 'AirChecker', 'SNR', 'dBm'],
    'challenges' => [
        'Paramétrer correctement l’appareil AirChecker à partir de la documentation.',
        'Interpréter conjointement signal strength, niveau de bruit et SNR.',
        'Comparer la qualité de couverture entre plusieurs bâtiments de l’IUT.'
    ],
    'results' => [
        'Tableaux de mesures détaillés pour les bâtiments G, C, D, E et F.',
        'Conclusion sur une couverture globalement bonne avec quelques zones à renforcer.',
        'Recommandations d’ajout de points Wi‑Fi dans certaines zones du bâtiment G.'
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
