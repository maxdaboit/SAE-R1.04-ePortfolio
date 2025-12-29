<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur principal du site (pages d'accueil, CV, e‑portfolio, passions).
 * Les “données” des projets et des analyses sont simulées par des méthodes privées.
 */
class HomeController extends AbstractController
{
    /**
     * Simule une base de données pour les projets.
     *
     * et des appels à un repository (ProjectRepository).
     */
    private function getProjects(): array
    {
        return [
            [
                'id'             => 1,
                'title'          => 'Création d’un site web ePortfolio',
                'category'       => 'AC13.04 / SAE 1.04',
                'description'    => 'Conception et développement d’un site Web personnel avec Symfony et Bootstrap pour présenter mon CV et mon e-Portfolio.',
                'full_description' => 'Dans la SAE 1.04, j’ai conçu l’architecture d’un site Web personnel puis je l’ai développé avec le framework Symfony. Le site comporte une page d’accueil de présentation, une page dédiée à mes loisirs et projets, une page CV structurée et des pages e-portfolio présentant mes compétences et preuves. J’ai utilisé Symfony (routes, contrôleurs, templates Twig) avec un thème Bootstrap/Bootswatch pour organiser clairement les différentes sections et assurer un rendu responsive. Le projet est versionné sur GitHub, ce qui permet de le maintenir et de le présenter facilement lors d’entretiens.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Programmer',
                'duration'       => 'SAE',
                'gradient'       => 'gradient-3',
                'imageFilename'  => 'AC13.04.png',
                'technologies'   => ['Symfony', 'PHP', 'Twig', 'Bootstrap/Bootswatch', 'GitHub', 'HTML5', 'CSS3', 'JavaScript'],
                'challenges'     => [
                    'Définir une architecture de site cohérente avec les besoins de présentation (CV, portfolio, infos personnelles).',
                    'Mettre en œuvre l’architecture MVC de Symfony pour structurer les pages.',
                    'Intégrer correctement un thème Bootstrap/Bootswatch, du javascript,... pour obtenir un site lisible et professionnel.',
                ],
                'results'        => [
                    'Site Web personnel fonctionnel, prêt à être présenté à des recruteurs.',
                    'Architecture et technologies Web mieux comprises grâce à Symfony et Bootstrap.',
                    'Base technique réutilisable pour un futur e-Portfolio plus complet.',
                ],
            ],
            [
                'id'             => 2,
                'title'          => 'Utiliser un système Linux avec Docker et mis en place du service samba via un script',
                'category'       => 'AC13.01 / TP',
                'description'    => 'Création de deux conteneurs Ubuntu (client/serveur) avec Docker, mise en place d’un partage Samba et automatisation via Dockerfile et scripts.',
                'full_description' => 'Dans ce TP, j’ai utilisé Docker pour créer deux environnements Ubuntu jouant les rôles de client et de serveur sur un même réseau virtuel. Après avoir vérifié l’environnement Docker, j’ai configuré le réseau, testé la connectivité avec ping, puis installé et configuré Samba pour proposer un partage de fichiers. J’ai ensuite mis en place des droits différenciés pour deux utilisateurs (lecture seule et lecture-écriture) et automatisé l’ensemble avec un Dockerfile, un script d’initialisation et un fichier docker-compose. Ce travail illustre ma capacité à utiliser un système Linux et ses outils en environnement conteneurisé.Le recours à Docker a été motivé par la nécessité de déployer rapidement ces environnements Linux sur différents postes de travail, de façon reproductible et légère.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Programmer',
                'duration'       => 'TP',
                'gradient'       => 'gradient-4',
                'imageFilename'  => 'AC13.01.png',
                'technologies'   => ['Docker', 'Ubuntu', 'Linux', 'Samba', 'Docker Compose'],
                'challenges'     => [
                    'Comprendre la différence entre commandes Docker sur l’hôte et commandes Linux dans les conteneurs.',
                    'Configurer correctement le réseau Docker pour permettre la communication entre client et serveur.',
                    'Mettre en place des partages Samba avec des droits distincts selon les utilisateurs.',
                ],
                'results'        => [
                    'Deux conteneurs Ubuntu opérationnels reliés sur un même sous-réseau Docker.',
                    'Partage Samba fonctionnel testé avec smbclient côté client.',
                    'Environnement reproductible grâce à un Dockerfile, un docker-compose.yml et des scripts d’initialisation/tests.',
                ],
            ],
            [
                'id'             => 3,
                'title'          => 'Installation d’un poste client Ubuntu LTS',
                'category'       => 'AC11.06 / TP',
                'description'    => 'Installation d’un poste client Ubuntu LTS dans une machine virtuelle VirtualBox et rédaction de la procédure détaillée.',
                'full_description' => 'Dans le cadre de l’AC11.06, j’ai installé un poste client Ubuntu LTS au sein d’une machine virtuelle VirtualBox. J’ai créé et configuré la VM, lancé l’installation du système, puis réalisé la configuration de base (mises à jour, réseau). Ce travail m’a permis de comprendre la mise en place d’un poste client Linux dans un environnement virtualisé et de documenter une procédure reproductible.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Administrer',
                'duration'       => 'TP',
                'gradient'       => 'gradient-2',
                'imageFilename'  => 'AC11.06.png',
                'technologies'   => ['VirtualBox', 'Ubuntu LTS', 'Linux'],
                'challenges'     => [
                    'Choisir des paramètres adaptés pour la machine virtuelle (RAM, disque).',
                    'Comprendre les modes réseau de VirtualBox pour permettre l’accès Internet.',
                    'Expliquer la procédure d’installation de manière claire et structurée.',
                ],
                'results'        => [
                    'Poste client Ubuntu LTS fonctionnel dans une VM VirtualBox.',
                    'Accès réseau opérationnel pour mises à jour et navigation.',
                    'Procédure d’installation rédigée et réutilisable pour d’autres postes.',
                ],
            ],
            [
                'id'             => 4,
                'title'          => 'Station de température et humidité',
                'category'       => 'AC11.02 / TP',
                'description'    => 'Réalisation d’une station de mesure température / humidité avec ESP32, DHT22, écran OLED et interface web.',
                'full_description' => 'TP de R106 visant à concevoir une station de surveillance de température et d’humidité basée sur un ESP32 et un capteur DHT22. Les données sont affichées sur un écran OLED SSD1306 et sur une page web servie par l’ESP32 en mode point d’accès WiFi. Une version avancée transforme le système en thermostat avec seuil configurable et pilotage d’un relais.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Administrer',
                'duration'       => 'TP',
                'gradient'       => 'gradient-4',
                'imageFilename'  => 'AC11.02.png',
                'technologies'   => ['ESP32', 'DHT22', 'OLED SSD1306', 'Arduino IDE', 'WiFi', 'HTML/CSS'],
                'challenges'     => [
                    'Lecture fiable du capteur DHT22 et gestion de son temps de réponse.',
                    'Intégration de l’écran OLED SSD1306 avec affichage clair des mesures.',
                    'Création d’un serveur web embarqué avec point d’accès WiFi sur l’ESP32.',
                    'Mise en place d’un thermostat avec seuil et relais configurables depuis l’interface web.',
                ],
                'results'        => [
                    'Station fonctionnelle affichant température et humidité en local et via le web.',
                    'Thermostat opérationnel pilotant un relais selon un seuil défini.',
                    'Meilleure maîtrise des capteurs, de l’ESP32, du WiFi embarqué et du HTML/CSS simples.',
                ],
            ],
            [
                'id'             => 5,
                'title'          => 'Devis matériel passif salle réseaux',
                'category'       => 'AC12.05 / SAE 1.03',
                'description'    => 'Élaboration d’un devis complet pour le renouvellement du matériel passif de la salle réseaux G007 du département RT.',
                'full_description' => 'Dans le cadre de la SAE 1.03, notre groupe a dû chiffrer un devis professionnel pour le renouvellement du matériel passif de la salle réseaux G007 : baie de brassage, panneaux, noyaux RJ45, câblage, goulottes, blocs bureaux et prises. En nous basant sur un cahier des charges et des références Legrand, nous avons estimé les quantités, les longueurs de câbles à partir du plan de la salle et la main-d’œuvre. Ce travail nous a permis de comprendre le processus complet d’élaboration d’un devis réseau réaliste et de le vendre à un client.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Connecter',
                'duration'       => 'SAE',
                'gradient'       => 'gradient-5',
                'imageFilename'  => 'AC12.05.png',
                'technologies'   => ['Câblage structuré', 'Baie de brassage', 'RJ45 Cat6', 'Devis réseau'],
                'challenges'     => [
                    'Estimer les longueurs de câbles et goulottes à partir du plan de la salle.',
                    'Choisir une baie de brassage et des accessoires compatibles et cohérents.',
                    'Intégrer la main-d’œuvre et un forfait d’intervention dans un devis réaliste.',
                ],
                'results'        => [
                    'Devis complet au nom de l’entreprise fictive MatMaxTech.',
                    'Total HT de 10 607,86 € et total TTC de 12 631,22 €.',
                    'Meilleure compréhension du coût global d’une installation réseau passive.',
                ],
            ],
            [
                'id'             => 6,
                'title'          => 'Partage de fichiers NFS/Samba et domaine Kerberos',
                'category'       => 'AC11.04 / TP',
                'description'    => 'Mise en place d’un serveur Linux de partage de fichiers (NFS/Samba) accessible depuis des clients Linux et Windows, avec domaine Kerberos.',
                'full_description' => 'Dans le cadre de l’AC11.03, j’ai configuré les fonctions de base d’un réseau local en déployant un serveur Linux offrant des partages de fichiers via NFS et Samba. Les postes clients Linux et Windows ont été intégrés à un domaine Kerberos, avec gestion des droits d’accès sur les répertoires partagés. Ce travail m’a permis de mettre en pratique l’administration à distance (SSH), la configuration de services réseau et la gestion des utilisateurs et permissions.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Administrer',
                'duration'       => 'TP',
                'gradient'       => 'gradient-1',
                'imageFilename'  => 'AC11.03.png',
                'technologies'   => ['Linux', 'SSH', 'NFS', 'Samba', 'Kerberos', 'Réseau local'],
                'challenges'     => [
                    'Configurer correctement les interfaces et cartes réseau virtuelles pour le réseau interne.',
                    'Résoudre les problèmes de pare-feu et de ports bloqués sur Windows.',
                    'Corriger les problèmes de résolution DNS impactant les services Kerberos et Samba.',
                ],
                'results'        => [
                    'Serveur de partage de fichiers fonctionnel accessible depuis Linux et Windows.',
                    'Domaine Kerberos opérationnel avec intégration de plusieurs machines.',
                    'Meilleure maîtrise des services réseau de base et de la gestion des droits d’accès.',
                ],
            ],
            [
                'id'             => 7,
                'title'          => 'Création et implémentation d’un nouveau réseau interne',
                'category'       => 'AC11.03 / SAE R1.02',
                'description'    => 'Conception et déploiement d’une extension réseau multi‑VLAN avec switch Cisco, routeur, DHCP, Syslog, TFTP et administration SSH.',
                'full_description' => 'Dans la SAE R1.02, j’ai configuré les fonctions de base d’un réseau local en concevant et en déployant une extension pour trois nouveaux services (Production, Commerciaux, RH) et un VLAN d’administration. Après un audit de l’existant via Wireshark et Tftpd64, j’ai défini un plan d’adressage IP, créé les VLAN sur un nouveau switch S5, configuré les ports en access ou trunk, et mis en place une interface d’administration. Un routeur a été configuré en router-on-a-stick avec relais DHCP vers un serveur Tftpd64, et l’administration distante a été sécurisée via SSH. Les tests en simulation Cisco Packet Tracer puis sur matériel réel avec des clients Ubuntu ont validé la bonne segmentation et le fonctionnement global du réseau.',
                'date'           => 'Semestre 1',
                'duration'       => 'SAE',
                'ACTYPE'         => 'Administrer',
                'gradient'       => 'gradient-2',
                'imageFilename'  => 'AC11.04.png',
                'technologies'   => ['Cisco IOS', 'VLAN', 'DHCP', 'Syslog', 'TFTP', 'SSH', 'Wireshark', 'VirtualBox', 'Ubuntu'],
                'challenges'     => [
                    'Reconstituer la topologie et les VLAN existants à partir de trames réseau et de fichiers de configuration.',
                    'Définir un plan d’adressage IP cohérent pour plusieurs VLAN sans conflit.',
                    'Configurer un routeur en router-on-a-stick avec relais DHCP et sécuriser l’accès SSH aux équipements.',
                ],
                'results'        => [
                    'Extension réseau multi‑VLAN fonctionnelle avec S5 et quatre services isolés.',
                    'Administration distante sécurisée du switch S5 en SSH depuis le VLAN d’administration.',
                    'Tests réussis avec des postes clients Ubuntu en mode pont validant la connectivité et la segmentation.',
                ],
            ],
            [
                'id'             => 8,
                'title'          => 'Lois fondamentales de l’électricité et sécurité',
                'category'       => 'AC11.01 / TD',
                'description'    => 'Étude des lois électriques fondamentales et des règles de sécurité à appliquer lors d’interventions sur des équipements de réseaux.',
                'full_description' => 'Cette activité m’a permis d’apprendre les bases de l’électricité (lois de Ohm et de Joule) et les règles de sécurité nécessaires pour intervenir sur des équipements électriques et réseaux. J’ai étudié les pictogrammes normalisés, les risques liés au courant électrique et les procédures à suivre avant et pendant toute intervention. Cet apprentissage m’a sensibilisé à la rigueur et à la prévention de tout risque électrique.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Administrer',
                'duration'       => 'Cours / TP',
                'gradient'       => 'gradient-6',
                'imageFilename'  => 'AC11.01.png',
                'technologies'   => ['Lois d’Ohm', 'Sécurité électrique', 'Normes NF', 'Pictogrammes', 'Multimètre'],
                'challenges'     => [
                    'Comprendre les effets du courant électrique et les lois fondamentales.',
                    'Appliquer les protocoles de sécurité avant toute intervention.',
                    'Reconnaître les logos et symboles normalisés de danger et d’interdiction.',
                ],
                'results'        => [
                    'Bonne compréhension des principes électriques de base.',
                    'Application rigoureuse des gestes de sécurité en milieu technique.',
                    'Sensibilisation au respect des normes et pictogrammes de prévention.',
                ],
            ],
            [
                'id'             => 9,
                'title'          => 'Mesure et analyse des signaux Wi‑Fi EDUROAM',
                'category'       => 'AC12.01 / SAE 1.03',
                'description'    => 'Audit Wi‑Fi du réseau EDUROAM à l’IUT : mesures terrain des signaux radio et analyse de la qualité de couverture.',
                'full_description' => 'Dans le cadre de la SAE 1.03, utilisée comme support pour l’AC12.01, notre groupe a réalisé un audit Wi‑Fi du réseau EDUROAM sur plusieurs bâtiments de l’IUT. À l’aide d’un AirChecker, nous avons mesuré le signal strength, le niveau de bruit, le SNR et les canaux utilisés à différents emplacements. Nous avons ensuite établi un barème de qualification des signaux et synthétisé les résultats dans des tableaux afin d’identifier les zones bien couvertes et celles où la qualité de connexion est plus faible. Ce travail m’a permis de mettre en pratique la mesure et l’analyse de signaux radio Wi‑Fi.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Connecter',
                'duration'       => 'SAE',
                'gradient'       => 'gradient-3',
                'imageFilename'  => 'AC12.01.png',
                'technologies'   => ['Wi‑Fi', 'Mesure', 'AirChecker', 'SNR', 'dBm'],
                'challenges'     => [
                    'Paramétrer correctement l’appareil AirChecker à partir de la documentation.',
                    'Interpréter conjointement signal strength, niveau de bruit et SNR.',
                    'Comparer la qualité de couverture entre plusieurs bâtiments de l’IUT.',
                ],
                'results'        => [
                    'Tableaux de mesures détaillés pour les bâtiments G, C, D, E et F.',
                    'Conclusion sur une couverture globalement bonne avec quelques zones à renforcer.',
                    'Recommandations d’ajout de points Wi‑Fi dans certaines zones du bâtiment G.',
                ],
            ],
            [
                'id'             => 10,
                'title'          => 'Gestion de données pour un outil d’audit réseau',
                'category'       => 'AC13.05 / SAE 1.05',
                'description'    => 'Conception d’un outil Python/Tkinter d’audit réseau avec choix et mise en œuvre de mécanismes de gestion de données adaptés (structures, CSV, Excel, graphiques).',
                'full_description' => 'Dans la SAÉ 1.05, j’ai développé un outil graphique d’audit réseau en Python capable d’analyser des fichiers de logs et de détecter des anomalies (saturation, SYN flood, scans de ports). J’ai structuré les données sous forme de dictionnaires et de compteurs (Counter, defaultdict) pour agréger efficacement les flux et les métriques de sécurité, puis j’ai centralisé ces données dans une liste réutilisée pour générer un rapport Markdown, un export CSV et un fichier Excel enrichi de graphiques via pandas et xlsxwriter. Ce projet illustre ma capacité à choisir des mécanismes de gestion de données cohérents avec les besoins de traitement, de restitution et d’ergonomie de l’outil.',
                'date'           => 'Semestre 1',
                'ACTYPE'         => 'Programmer',
                'duration'       => 'SAÉ',
                'gradient'       => 'gradient-5',
                'imageFilename'  => 'AC13.05.png',
                'technologies'   => ['Python', 'Tkinter', 'CSV', 'pandas', 'xlsxwriter', 'Regex'],
                'challenges'     => [
                    'Définir une structure de données unique pouvant servir à la fois au rapport, au CSV et à l’Excel.',
                    'Choisir les bons agrégats (Counter, defaultdict) pour calculer les indicateurs de sécurité.',
                    'Intégrer proprement la partie traitement de données dans une interface graphique Tkinter.',
                ],
                'results'        => [
                    'Outil d’audit réseau opérationnel avec rapport Markdown et exports CSV / Excel.',
                    'Visualisation des consommations et des attaques (SYN, scans) via des graphiques automatiques.',
                    'Validation de la compétence AC13.05 sur le choix et l’argumentation des mécanismes de gestion de données.',
                ],
            ],
        ];
    }

    /**
     * Simule une base de données pour les analyses réflexives.
     *
     * Chaque entrée est liée à un projet via project_id.
     * Plus tard, cela pourra devenir une entité ReflexiveAnalysis.
     */
    private function getReflexiveAnalyses(): array
    {
        return [
            [
                'project_id' => 1,
                'text1'      => "J’ai ressenti beaucoup de motivation, mais aussi parfois un peu de stress devant tout ce qu’il fallait organiser (pages, design, contenu). Cela montre que j’ai vraiment progressé sur la façon de construire un site moderne et de soigner mon image en ligne.\n",
                'text2'      => "Je retiens que j’ai renforcé mes bases en architecture de site Web et en Symfony, et que je dois encore travailler la structure de mon code et l’ajout d’une vraie base de données.",
                'text3'      => "Pour m’améliorer, je vais mieux préparer mon plan de site avant de coder, simplifier et réutiliser mes templates/CSS, et connecter Symfony à une base de données pour gérer mes projets et expériences.\n",
            ],
            [
                'project_id' => 2,
                'text1'      => "J’ai ressenti d’abord une certaine confusion entre les commandes à lancer sur l’hôte et dans les conteneurs, puis beaucoup de satisfaction quand tout a enfin fonctionné correctement. Cela montre que j’ai vraiment progressé dans ma façon de gérer un environnement Docker/Linux et que je sais mieux m’appuyer sur des scripts reproductibles pour gagner du temps et éviter les erreurs.",
                'text2'      => "Je retiens que j’ai renforcé ma maîtrise de Docker et de Samba, et que je dois encore travailler l’usage avancé de Docker Compose (volumes, variables d’environnement, logs) ainsi que la clarté de la documentation de mes scripts.",
                'text3'      => "Pour m’améliorer, je vais commenter davantage mes scripts, exploiter plus systématiquement les fonctionnalités de Docker Compose et vérifier la cohérence des IP, utilisateurs et noms de partage avant chaque campagne de tests.",
            ],
            [
                'project_id' => 3,
                'text1'      => "Au début, j’étais un peu hésitant sur le choix des ressources pour la VM et sur les différents modes réseau de VirtualBox, puis j’ai été vraiment content quand le poste Ubuntu s’est mis à fonctionner correctement avec un accès Internet stable. Cela montre que j’ai mieux compris la virtualisation, les besoins réels d’un poste client Linux et l’impact du mode réseau sur la connectivité en TP.",
                'text2'      => "Je retiens que j’ai renforcé ma capacité à préparer rapidement un poste client Linux virtualisé, mais que je dois encore travailler la compréhension fine des modes réseau VirtualBox et la qualité de ma documentation.",
                'text3'      => "Pour m’améliorer, je vais utiliser des fiches de bonnes pratiques pour dimensionner les VM, tester plusieurs modes réseau (NAT, pont, interne) et enrichir mes guides d’installation avec des captures d’écran commentées.",
            ],
            [
                'project_id' => 4,
                'text1'      => "Pendant ce projet, j’ai pris du plaisir à voir la station température / humidité fonctionner, mais j’ai aussi été agacé par la lenteur du DHT22 et par les difficultés avec l’affichage OLED et le HTML en C. Cela montre que j’ai appris à mieux faire le lien entre la partie électronique (capteur, câblage, relais) et la partie logicielle (boucle de mesure, temporisation, serveur web), et à comprendre comment certains choix techniques influencent la fiabilité du système.",
                'text2'      => "Je retiens que j’ai renforcé ma capacité à configurer un ESP32, utiliser les bibliothèques Arduino (DHT, OLED, WiFi, WebServer) et concevoir une petite architecture IoT avec affichage local et interface web, et que je dois encore travailler la gestion des erreurs capteur, la robustesse des formulaires web et les aspects de sécurité (mot de passe WiFi, paramètres sensibles).",
                'text3'      => "Pour m’améliorer, je vais ajouter des contrôles d’erreur autour des lectures du capteur, mieux documenter les paramètres envoyés par les formulaires web et renforcer dès le départ la sécurité (SSID/mot de passe, messages d’alerte) dans ce type de projet.",
            ],
            [
                'project_id' => 5,
                'text1'      => "Sur ce devis, j’ai trouvé intéressant de travailler sur un cas concret de salle réseaux, tout en étant parfois un peu perdu pour estimer les longueurs de câbles/goulottes et choisir une baie vraiment compatible. Cela montre que j’ai appris à mieux faire le lien entre les contraintes techniques (câblage structuré, catégorie 6, dimensions) et les contraintes économiques (prix, HT/TTC, main-d’œuvre) dans un document pour un client.",
                'text2'      => "Je retiens que j’ai renforcé ma compréhension des éléments de câblage structuré et de la logique d’un devis professionnel, et que je dois encore travailler la prise en compte des coûts imprévus, des marges et la précision de mes hypothèses.",
                'text3'      => "Pour m’améliorer, je vais utiliser des schémas et des métrés détaillés pour les longueurs de câbles, prévoir une marge de sécurité sur les quantités et coûts, et noter clairement toutes mes hypothèses pour pouvoir défendre mon devis à l’oral.",
            ],
            [
                'project_id' => 6,
                'text1'      => "Dans cette activité, j’ai parfois été bloqué par des problèmes de DNS et de pare-feu Windows qui empêchaient les clients d’accéder aux partages, mais j’ai aussi été vraiment content quand tout a fini par fonctionner étape par étape. Cela montre que j’ai progressé dans ma compréhension des services réseau (Samba, NFS, Kerberos, DNS) et de la façon dont ils dépendent les uns des autres pour offrir un partage de fichiers fiable.",
                'text2'      => "Je retiens que j’ai renforcé ma capacité à installer et configurer des services de partage de fichiers sous Linux, et que je dois encore travailler l’attribution fine des droits d’accès et la compréhension du DNS.",
                'text3'      => "Pour m’améliorer, je vais refaire des exercices de configuration complets, prendre des notes sur les étapes importantes (DNS, pare-feu, droits) et garder des fiches mémo pour ne plus me perdre dans les réglages.",
            ],
            [
                'project_id' => 7,
                'text1'      => "Au début de ce projet réseau, j’ai ressenti pas mal de pression à cause du manque de documentation sur l’existant, puis j’ai été de plus en plus rassuré en voyant la topologie se clarifier grâce aux analyses de trames et aux tests de ping. Cela montre que j’ai appris à m’appuyer sur des outils comme Wireshark, Tftpd64 et Packet Tracer pour reconstruire un réseau peu documenté et à mieux comprendre le rôle des VLAN, des trunks, du router-on-a-stick et des services centralisés dans un LAN.",
                'text2'      => "Je retiens que j’ai renforcé ma maîtrise des VLAN, de l’adressage IP par service, du routage inter-VLAN et de la centralisation des services (DHCP, Syslog, TFTP), et que je dois encore travailler l’automatisation des sauvegardes/logs et la sécurisation avancée (ACL, filtrage des accès distants).",
                'text3'      => "Pour m’améliorer, je vais documenter dès le départ la topologie et les VLAN, mettre en place des scripts pour automatiser les sauvegardes et la collecte des logs, et commencer à utiliser des ACL pour mieux contrôler les flux et les accès administratifs.",
            ],
            [
                'project_id' => 8,
                'text1'      => "Dans cette activité, j’ai parfois eu du mal à relier concrètement tension, courant et résistance, ainsi qu’à mémoriser certains pictogrammes de sécurité, mais j’ai pris confiance au fur et à mesure des exercices de mesure. Cela montre que j’ai commencé à mieux comprendre les effets du courant sur les équipements et sur le corps humain, et à faire le lien entre la théorie électrique et les gestes de sécurité indispensables avant toute intervention.",
                'text2'      => "Je retiens que j’ai renforcé ma compréhension des notions de base en électricité (relations entre tension, courant, résistance) et des règles de prévention des risques, et que je dois encore progresser dans l’interprétation rapide des mesures et la maîtrise des symboles de sécurité.",
                'text3'      => "Pour m’améliorer, je vais refaire des exercices de mesure avec le multimètre en les reliant systématiquement aux lois vues en cours, utiliser des fiches mémo pour les pictogrammes et normes, et m’habituer à dérouler une checklist de sécurité avant toute manipulation.",
            ],
            [
                'project_id' => 9,
                'text1'      => "Dans ce projet d’audit WiFi, j’ai apprécié les mesures sur le terrain avec l’AirChecker, même si j’ai parfois eu du mal à interpréter tous les indicateurs radio (dBm, SNR, bruit) et à comprendre pourquoi la qualité variait autant selon les bâtiments. Cela montre que j’ai appris à relier des mesures théoriques de SNR et de seuils de qualité à une situation réelle de couverture WiFi, et à voir comment ces paramètres orientent les décisions techniques sur les points d’accès et les canaux.",
                'text2'      => "Je retiens que j’ai renforcé ma capacité à mesurer et analyser des signaux WiFi de manière structurée, en utilisant un barème de qualité et en comparant les bâtiments pour repérer les zones faibles, mais que je dois encore progresser dans l’interprétation fine des indicateurs et des interférences.",
                'text3'      => "Pour m’améliorer, je vais approfondir la théorie sur les canaux WiFi et les interférences, m’entraîner à lire plus rapidement les valeurs dBm/SNR sur des cas concrets, et proposer systématiquement un petit plan d’action argumenté après les mesures (ajout/déplacement de points d’accès, changement de canaux).",
            ],
            [
                'project_id' => 10,
                'text1'      => "Dans ce projet, j’ai pris plaisir à voir mon outil d’audit réseau en Python/Tkinter analyser des logs tcpdump et organiser les résultats en tableaux, graphiques et rapports, même si la structuration du modèle de données cohérent entre Markdown, CSV et Excel m’a parfois paru complexe. Cela montre que j’ai appris à choisir des mécanismes adaptés pour gérer les données (listes de dictionnaires, Counter, pandas, etc.) et à les organiser autour d’une même structure pour garder un outil fiable et évolutif.",
                'text2'      => "Je retiens que j’ai renforcé ma capacité à concevoir un modèle de données réutilisable dans plusieurs contextes (affichage, export CSV, reporting Excel) et à m’appuyer sur les bonnes bibliothèques Python pour traiter et visualiser des données réseau, mais que je dois encore travailler sur le stockage persistant et la préparation de nouveaux formats de logs ou d’indicateurs.",
                'text3'      => "Pour m’améliorer, je vais intégrer une base de données légère pour historiser les audits, mieux séparer le modèle de données dans des classes ou modules dédiés, et prévoir dès le départ des points d’extension pour ajouter de nouveaux types d’analyses ou d’exports sans tout réécrire.",
            ],
            // ajouter une entrée par projet où tu veux une analyse
        ];
    }

    /**
     * Page d’accueil.
     * Affiche la liste des projets (e‑portfolio).
     */
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'projects' => $this->getProjects(),
        ]);
    }

    /**
     * Page de CV.
     */
    #[Route('/cv', name: 'app_cv')]
    public function cv(): Response
    {
        return $this->render('home/cv.html.twig');
    }

    /**
     * Page e‑portfolio.
     * Réutilise la même liste de projets que la page d’accueil.
     */
    #[Route('/eportfolio', name: 'app_eportfolio')]
    public function eportfolio(): Response
    {
        return $this->render('home/eportfolio.html.twig', [
            'projects' => $this->getProjects(),
        ]);
    }

    /**
     * Page de contact + téléchargement du CV en PDF après envoi du formulaire.
     *
     * Si le formulaire est valide, on renvoie une réponse "file download"
     * pour le fichier cv_daboit.pdf situé dans public/.
     */
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request): Response
    {
        // Création et traitement du formulaire de contact
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide, on renvoie le CV en PDF
        if ($form->isSubmitted() && $form->isValid()) {
            $pdfPath = $this->getParameter('kernel.project_dir') . '/public/cv_daboit.pdf';

            // Création de la réponse de téléchargement
            $response = $this->file(
                $pdfPath,
                'CV_DA_BOIT_Maxence.pdf',
                ResponseHeaderBag::DISPOSITION_ATTACHMENT
            );

            // Forcer le bon Content-Type
            $response->headers->set('Content-Type', 'application/pdf');

            return $response;
        }

        // Sinon : on affiche le formulaire
        return $this->render('home/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Page de détail d’un projet.
     *
     * Affiche les informations du projet et, si disponible, son analyse réflexive.
     */
    #[Route('/project/{id}', name: 'app_project_detail')]
    public function projectDetail(int $id): Response
    {
        $projects  = $this->getProjects();
        $analyses  = $this->getReflexiveAnalyses();

        $selectedProject  = null;
        $selectedAnalysis = null;

        // Recherche du projet correspondant à l'id
        foreach ($projects as $project) {
            if ($project['id'] === $id) {
                $selectedProject = $project;
                break;
            }
        }

        // Recherche de l’analyse reflexive liée au projet (si elle existe)
        foreach ($analyses as $analysis) {
            if ($analysis['project_id'] === $id) {
                $selectedAnalysis = $analysis;
                break;
            }
        }

        // Si aucun projet trouvé, on renvoie une 404
        if (!$selectedProject) {
            throw $this->createNotFoundException('Réalisation non trouvée !');
        }

        // Rendu de la page de détail
        return $this->render('home/project_detail.html.twig', [
            'project'  => $selectedProject,
            'analysis' => $selectedAnalysis,
        ]);
    }

    // --- ROUTES PASSIONS ---

    /**
     * Page listant les passions.
     */
    #[Route('/passions', name: 'app_passions')]
    public function passions(): Response
    {
        return $this->render('home/passions/index.html.twig');
    }

    /**
     * Page passion : japonais.
     */
    #[Route('/passion/japanese', name: 'app_japanese')]
    public function japanese(): Response
    {
        return $this->render('home/passions/japanese.html.twig');
    }

    /**
     * Page passion : Linux.
     */
    #[Route('/passion/linux', name: 'app_linux')]
    public function linux(): Response
    {
        return $this->render('home/passions/linux.html.twig');
    }

    /**
     * Page passion : photographie.
     */
    #[Route('/passion/photographie', name: 'app_photographie')]
    public function photographie(): Response
    {
        return $this->render('home/passions/photographie.html.twig');
    }
}
