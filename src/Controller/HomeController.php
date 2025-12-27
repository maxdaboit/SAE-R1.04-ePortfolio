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
    'title' => 'Création d’un site web ePortfolio',
    'category' => 'AC13.04 / SAE 1.04',
    'description' => 'Conception et développement d’un site Web personnel avec Symfony et Bootstrap pour présenter mon CV et mon e-Portfolio.',
    'full_description' => 'Dans la SAE 1.04, j’ai conçu l’architecture d’un site Web personnel puis je l’ai développé avec le framework Symfony. Le site comporte une page d’accueil de présentation, une page dédiée à mes loisirs et projets, une page CV structurée et des pages e-portfolio présentant mes compétences et preuves. J’ai utilisé Symfony (routes, contrôleurs, templates Twig) avec un thème Bootstrap/Bootswatch pour organiser clairement les différentes sections et assurer un rendu responsive. Le projet est versionné sur GitHub, ce qui permet de le maintenir et de le présenter facilement lors d’entretiens.',
    'date' => 'Semestre 1',
    'ACTYPE' => 'Programmer',
    'duration' => 'SAE',
    'gradient' => 'gradient-3',
    'imageFilename' => 'AC13.04.png',
    'technologies' => ['Symfony', 'PHP', 'Twig', 'Bootstrap/Bootswatch', 'GitHub', 'HTML5', 'CSS3', 'JavaScript'],
    'challenges' => [
        'Définir une architecture de site cohérente avec les besoins de présentation (CV, portfolio, infos personnelles).',
        'Mettre en œuvre l’architecture MVC de Symfony pour structurer les pages.',
        'Intégrer correctement un thème Bootstrap/Bootswatch, du javascript,... pour obtenir un site lisible et professionnel.'
    ],
    'results' => [
        'Site Web personnel fonctionnel, prêt à être présenté à des recruteurs.',
        'Architecture et technologies Web mieux comprises grâce à Symfony et Bootstrap.',
        'Base technique réutilisable pour un futur e-Portfolio plus complet.'
    ]
],
            [
    'id' => 2,
    'title' => 'Utiliser un système Linux avec Docker et mis en place du service samba via un script',
    'category' => 'AC13.01 / TP',
    'description' => 'Création de deux conteneurs Ubuntu (client/serveur) avec Docker, mise en place d’un partage Samba et automatisation via Dockerfile et scripts.',
    'full_description' => 'Dans ce TP, j’ai utilisé Docker pour créer deux environnements Ubuntu jouant les rôles de client et de serveur sur un même réseau virtuel. Après avoir vérifié l’environnement Docker, j’ai configuré le réseau, testé la connectivité avec ping, puis installé et configuré Samba pour proposer un partage de fichiers. J’ai ensuite mis en place des droits différenciés pour deux utilisateurs (lecture seule et lecture-écriture) et automatisé l’ensemble avec un Dockerfile, un script d’initialisation et un fichier docker-compose. Ce travail illustre ma capacité à utiliser un système Linux et ses outils en environnement conteneurisé.Le recours à Docker a été motivé par la nécessité de déployer rapidement ces environnements Linux sur différents postes de travail, de façon reproductible et légère.',
    'date' => 'Semestre 1',
    'ACTYPE' => 'Programmer',
    'duration' => 'TP',
    'gradient' => 'gradient-4',
    'imageFilename' => 'AC13.01.png',
    'technologies' => ['Docker', 'Ubuntu', 'Linux', 'Samba', 'Docker Compose'],
    'challenges' => [
        'Comprendre la différence entre commandes Docker sur l’hôte et commandes Linux dans les conteneurs.',
        'Configurer correctement le réseau Docker pour permettre la communication entre client et serveur.',
        'Mettre en place des partages Samba avec des droits distincts selon les utilisateurs.'
    ],
    'results' => [
        'Deux conteneurs Ubuntu opérationnels reliés sur un même sous-réseau Docker.',
        'Partage Samba fonctionnel testé avec smbclient côté client.',
        'Environnement reproductible grâce à un Dockerfile, un docker-compose.yml et des scripts d’initialisation/tests.'
    ]
],

            [
    'id' => 3,
    'title' => 'Installation d’un poste client Ubuntu LTS',
    'category' => 'AC11.06 / TP',
    'description' => 'Installation d’un poste client Ubuntu LTS dans une machine virtuelle VirtualBox et rédaction de la procédure détaillée.',
    'full_description' => 'Dans le cadre de l’AC11.06, j’ai installé un poste client Ubuntu LTS au sein d’une machine virtuelle VirtualBox. J’ai créé et configuré la VM, lancé l’installation du système, puis réalisé la configuration de base (mises à jour, réseau). Ce travail m’a permis de comprendre la mise en place d’un poste client Linux dans un environnement virtualisé et de documenter une procédure reproductible.',
    'date' => 'Semestre 1',
    'ACTYPE' => 'Administrer',
    'duration' => 'TP',
    'gradient' => 'gradient-2',
    'imageFilename' => 'AC11.06.png',
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
    'ACTYPE' => 'Administrer',
    'duration' => 'TP',
    'gradient' => 'gradient-4',
    'imageFilename' => 'AC11.02.png',
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
    'id' => 5,
    'title' => 'Devis matériel passif salle réseaux',
    'category' => 'AC12.05 / SAE 1.03',
    'description' => 'Élaboration d’un devis complet pour le renouvellement du matériel passif de la salle réseaux G007 du département RT.',
    'full_description' => 'Dans le cadre de la SAE 1.03, notre groupe a dû chiffrer un devis professionnel pour le renouvellement du matériel passif de la salle réseaux G007 : baie de brassage, panneaux, noyaux RJ45, câblage, goulottes, blocs bureaux et prises. En nous basant sur un cahier des charges et des références Legrand, nous avons estimé les quantités, les longueurs de câbles à partir du plan de la salle et la main-d’œuvre. Ce travail nous a permis de comprendre le processus complet d’élaboration d’un devis réseau réaliste et de le vendre à un client.',
    'date' => 'Semestre 1',
    'ACTYPE' => 'Connecter',
    'duration' => 'SAE',
    'gradient' => 'gradient-5',
    'imageFilename' => 'AC12.05.png',
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
    'id' => 6,
    'title' => 'Partage de fichiers NFS/Samba et domaine Kerberos',
    'category' => 'AC11.04 / TP',
    'description' => 'Mise en place d’un serveur Linux de partage de fichiers (NFS/Samba) accessible depuis des clients Linux et Windows, avec domaine Kerberos.',
    'full_description' => 'Dans le cadre de l’AC11.03, j’ai configuré les fonctions de base d’un réseau local en déployant un serveur Linux offrant des partages de fichiers via NFS et Samba. Les postes clients Linux et Windows ont été intégrés à un domaine Kerberos, avec gestion des droits d’accès sur les répertoires partagés. Ce travail m’a permis de mettre en pratique l’administration à distance (SSH), la configuration de services réseau et la gestion des utilisateurs et permissions.',
    'date' => 'Semestre 1',
    'ACTYPE' => 'Administrer',
    'duration' => 'TP',
    'gradient' => 'gradient-1',
    'imageFilename' => 'AC11.03.png',
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
    'id' => 7,
    'title' => 'Création et implémentation d’un nouveau réseau interne',
    'category' => 'AC11.03 / SAE R1.02',
    'description' => 'Conception et déploiement d’une extension réseau multi‑VLAN avec switch Cisco, routeur, DHCP, Syslog, TFTP et administration SSH.',
    'full_description' => 'Dans la SAE R1.02, j’ai configuré les fonctions de base d’un réseau local en concevant et en déployant une extension pour trois nouveaux services (Production, Commerciaux, RH) et un VLAN d’administration. Après un audit de l’existant via Wireshark et Tftpd64, j’ai défini un plan d’adressage IP, créé les VLAN sur un nouveau switch S5, configuré les ports en access ou trunk, et mis en place une interface d’administration. Un routeur a été configuré en router-on-a-stick avec relais DHCP vers un serveur Tftpd64, et l’administration distante a été sécurisée via SSH. Les tests en simulation Cisco Packet Tracer puis sur matériel réel avec des clients Ubuntu ont validé la bonne segmentation et le fonctionnement global du réseau.',
    'date' => 'Semestre 1',
    'duration' => 'SAE',
    'ACTYPE' => 'Administrer',
    'gradient' => 'gradient-2',
    'imageFilename' => 'AC11.04.png',
    'technologies' => ['Cisco IOS', 'VLAN', 'DHCP', 'Syslog', 'TFTP', 'SSH', 'Wireshark', 'VirtualBox', 'Ubuntu'],
    'challenges' => [
        'Reconstituer la topologie et les VLAN existants à partir de trames réseau et de fichiers de configuration.',
        'Définir un plan d’adressage IP cohérent pour plusieurs VLAN sans conflit.',
        'Configurer un routeur en router-on-a-stick avec relais DHCP et sécuriser l’accès SSH aux équipements.'
    ],
    'results' => [
        'Extension réseau multi‑VLAN fonctionnelle avec S5 et quatre services isolés.',
        'Administration distante sécurisée du switch S5 en SSH depuis le VLAN d’administration.',
        'Tests réussis avec des postes clients Ubuntu en mode pont validant la connectivité et la segmentation.'
    ]
],
[
    'id' => 8,
    'title' => 'Lois fondamentales de l’électricité et sécurité',
    'category' => 'AC11.01 / TD',
    'description' => 'Étude des lois électriques fondamentales et des règles de sécurité à appliquer lors d’interventions sur des équipements de réseaux.',
    'full_description' => 'Cette activité m’a permis d’apprendre les bases de l’électricité (lois de Ohm et de Joule) et les règles de sécurité nécessaires pour intervenir sur des équipements électriques et réseaux. J’ai étudié les pictogrammes normalisés, les risques liés au courant électrique et les procédures à suivre avant et pendant toute intervention. Cet apprentissage m’a sensibilisé à la rigueur et à la prévention de tout risque électrique.',
    'date' => 'Semestre 1',
    'ACTYPE' => 'Administrer',
    'duration' => 'Cours / TP',
    'gradient' => 'gradient-6',
    'imageFilename' => 'AC11.01.png',
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
    'ACTYPE' => 'Connecter',
    'duration' => 'SAE',
    'gradient' => 'gradient-3',
    'imageFilename' => 'AC12.01.png',
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
[
    'id' => 10,
    'title' => 'Gestion de données pour un outil d’audit réseau',
    'category' => 'AC13.05 / SAE 1.05',
    'description' => 'Conception d’un outil Python/Tkinter d’audit réseau avec choix et mise en œuvre de mécanismes de gestion de données adaptés (structures, CSV, Excel, graphiques).',
    'full_description' => 'Dans la SAÉ 1.05, j’ai développé un outil graphique d’audit réseau en Python capable d’analyser des fichiers de logs et de détecter des anomalies (saturation, SYN flood, scans de ports). J’ai structuré les données sous forme de dictionnaires et de compteurs (Counter, defaultdict) pour agréger efficacement les flux et les métriques de sécurité, puis j’ai centralisé ces données dans une liste réutilisée pour générer un rapport Markdown, un export CSV et un fichier Excel enrichi de graphiques via pandas et xlsxwriter. Ce projet illustre ma capacité à choisir des mécanismes de gestion de données cohérents avec les besoins de traitement, de restitution et d’ergonomie de l’outil.',
    'date' => 'Semestre 1',
    'ACTYPE' => 'Programmer',
    'duration' => 'SAÉ',
    'gradient' => 'gradient-5',
    'imageFilename' => 'AC13.05.png',
    'technologies' => ['Python', 'Tkinter', 'CSV', 'pandas', 'xlsxwriter', 'Regex'],
    'challenges' => [
        'Définir une structure de données unique pouvant servir à la fois au rapport, au CSV et à l’Excel.',
        'Choisir les bons agrégats (Counter, defaultdict) pour calculer les indicateurs de sécurité.',
        'Intégrer proprement la partie traitement de données dans une interface graphique Tkinter.'
    ],
    'results' => [
        'Outil d’audit réseau opérationnel avec rapport Markdown et exports CSV / Excel.',
        'Visualisation des consommations et des attaques (SYN, scans) via des graphiques automatiques.',
        'Validation de la compétence AC13.05 sur le choix et l’argumentation des mécanismes de gestion de données.'
    ]
],
        ];
    }
/**
 * Simule une base de données pour les analyses réflexives
 */
private function getReflexiveAnalyses(): array
{
    return [
        [
            'project_id' => 1,
            'text1' => "Dans ce projet, j’ai… (faits + ressenti + analyse).",
            'text2' => "Je retiens que j’ai renforcé… (conclusions / avenir).",
            'text3' => "Pour le prochain projet, je vais… (actions concrètes).",
        ],
        [
            'project_id' => 2,
            'text1' => "…",
            'text2' => "…",
            'text3' => "…",
        ],
        [
            'project_id' => 3,
            'text1' => "…",
            'text2' => "…",
            'text3' => "…",
        ],
        [
            'project_id' => 4,
            'text1' => "…",
            'text2' => "…",
            'text3' => "…",
        ],
        [
            'project_id' => 5,
            'text1' => "…",
            'text2' => "…",
            'text3' => "…",
        ],
        [
            'project_id' => 6,
            'text1' => "…",
            'text2' => "…",
            'text3' => "…",
        ],
        [
            'project_id' => 7,
            'text1' => "…",
            'text2' => "…",
            'text3' => "…",
        ],
        [
            'project_id' => 8,
            'text1' => "…",
            'text2' => "…",
            'text3' => "…",
        ],
        [
            'project_id' => 9,
            'text1' => "…",
            'text2' => "…",
            'text3' => "…",
        ],
        // ajouter une entrée par projet où tu veux une analyse
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
    $projects  = $this->getProjects();
    $analyses  = $this->getReflexiveAnalyses(); // méthode à ajouter plus haut
    $selectedProject  = null;
    $selectedAnalysis = null;

    foreach ($projects as $p) {
        if ($p['id'] === $id) {
            $selectedProject = $p;
            break;
        }
    }

    foreach ($analyses as $a) {
        if ($a['project_id'] === $id) {
            $selectedAnalysis = $a;
            break;
        }
    }

    if (!$selectedProject) {
        throw $this->createNotFoundException('Réalisation non trouvée !');
    }

    return $this->render('home/project_detail.html.twig', [
        'project'  => $selectedProject,
        'analysis' => $selectedAnalysis,
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
    #[Route('/passion/photographie', name: 'app_photographie')]
    public function photographie(): Response
    {
        return $this->render('home/passions/photographie.html.twig');
    }
}
