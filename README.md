# SAE1.04 – ePortfolio (Symfony)

Ce dépôt contient mon **site ePortfolio** développé avec Symfony dans le cadre de la SAE1.04 « Se présenter sur internet » du BUT Réseaux et Télécommunications.  
L’objectif est de créer un site web professionnel permettant de présenter mon profil, mon CV et mon portfolio de compétences.

## 🎯 Objectifs du projet

- Construire une identité numérique professionnelle cohérente.
- Mettre en valeur mes compétences et expériences (académiques et personnelles).
- Préparer un support de présentation pour de futurs entretiens (stage, alternance, emploi).

## 🧩 Fonctionnalités attendues (cahier des charges)

Le site respecte les exigences de la SAE1.04 :

- Page d’accueil avec :
  - Informations personnelles (nom, prénom, groupe TP, etc.).
  - Une phrase de présentation.
  - Un container « Menu » menant vers une page Mes passions/Mon Portfolio.
- Une page **Mes Passions** avec des photos et une mise en page soignée présentant mes passions.
- Page **CV** comprenant :
  - Les sections : **Formations**, **Expériences professionnelles**, **Compétences**.
- Une page **Mon Portfolio** :
  - Mise en avant de mes compétences avec des preuves et des analyses réflexives issues du portfolio de formation.
- Un **formulaire d’inscription** (sans base de données) permettant de saisir des informations pour générer/imprimer un CV au format PDF.
- Un **pied de page** présent sur toutes les pages, avec les informations légales et de protection contre la copie (et utilisation d’images libres de droits si nécessaire).

## 🛠️ Stack technique

- **Framework** : Symfony (version à préciser, ex. 6.x)
- **Langage back-end** : PHP  
- **Templates** : Twig  
- **Front-end** :
  - HTML / CSS
  - Bootstrap / Bootswatch
  - JavaScript pour les interactions dynamiques (comportements, animations, validations, etc.).
- **Gestion des dépendances** : Composer  
- **Versionnement** : Git & GitHub (repository exigé dans le cahier des charges).

## 🚀 Installation et exécution

1. Prérequis : installer PHP, Composer, Git et (optionnel) la CLI Symfony.
2. Cloner le projet :
   git clone https://github.com/maxdaboit/SAE-R1.04-ePortfolio.git
   cd SAE-R1.04-ePortfolio
3. Installer les dépendances :
   composer install
4. Lancer le serveur de développement :
   symfony serve
   (ou php -S localhost:8000 -t public/)
5. Ouvrir le site dans le navigateur à l’adresse indiquée (souvent https://127.0.0.1:8000).
6. Arrêter le serveur avec Ctrl + C dans le terminal.
