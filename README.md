# Application Web de Gestion Administrative des Projets de Fin de Cycle (PFC)

## Présentation du projet

Ce projet a été réalisé dans le cadre de mon **Projet de Fin de Cycle (PFC)** pour l'obtention de mon **Master 2 en Génie Logiciel** à l'Université Abderrahmane Mira de Béjaïa.

Il porte sur la **conception et le développement d'une application web de gestion administrative du département d'Informatique, avec pour cas d'étude la gestion des Projets de Fin de Cycle (PFC).

L'application vise à faciliter l'organisation, le suivi et la gestion administrative des projets de fin de cycle, en centralisant les informations et en structurant les différentes opérations liées à leur gestion.

## Objectifs

- Informatiser la gestion administrative des PFC.
- Centraliser les informations relatives aux étudiants, aux enseignants et aux sujets de projets.
- Faciliter l'organisation et le suivi des projets.
- Structurer les choix et l'affectation des sujets.
- Améliorer l'accès aux informations et la gestion des données.

## Fonctionnalités

Les fonctionnalités de l'application comprennent notamment :

- Gestion des utilisateurs et des accès selon les rôles.
- Gestion des étudiants et des enseignants.
- Gestion des sujets de projets.
- Gestion des sessions.
- Consultation et gestion des choix de sujets.
- Affectation des sujets.
- Consultation des informations liées aux projets.
- Organisation et suivi des activités administratives.

## Technologies utilisées

- **Backend :** PHP, Laravel 11
- **Base de données :** MySQL
- **Frontend :** Blade, HTML, CSS, JavaScript, Bootstrap
- **Modélisation :** UML
- **Méthodologie :** Scrum
- **Environnement de développement :** XAMPP
- **Gestion de versions :** Git et GitHub

## Conception

La conception du système s'appuie sur la modélisation UML, notamment :

Diagramme de classes

![Diagramme de classe ](docs/imagesAPP/DIAGRAME%20DE%20CLASSE.PNG)

Diagramme de cas d'utilisation — Administrateur

![Diagramme de cas d'utilisation Administrateur ](docs/imagesAPP/DIAGRAME%20DE%20CAS%20ADMIN.PNG)

Diagramme de cas d'utilisation — Enseignant

![Diagramme de cas d'utilisation Enseignant](docs/imagesAPP/DIAGRAMME%20DE%20CAS%20ENS.PNG)

Diagramme de cas d'utilisation — Étudiant
![Diagramme de cas d'utilisation etudiant ](docs/imagesAPP/DIAGRAMME%20DE%20CAS%20ETUDIANT.PNG)




## Structure des données

Parmi les principales tables de la base de données :

- `users`
- `sujets`
- `choix`
- `sessions`

Cette liste présente quelques tables principales et ne constitue pas nécessairement la totalité du schéma de la base de données.

## Installation et lancement

### Prérequis

- PHP compatible avec la version de Laravel utilisée
- Composer
- MySQL
- Node.js et npm
- Git
- XAMPP ou un environnement équivalent

### 1. Cloner le dépôt

```bash
git clone https://github.com/ninaHAT08/projet_fin_de_cycle_2024.git
cd projet_fin_de_cycle_2024
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Configurer les variables d'environnement

Créer le fichier `.env` à partir de `.env.example` :

```bash
copy .env.example .env
```

Configurer ensuite les paramètres de connexion à la base de données dans `.env` :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=gestionpfc
DB_USERNAME=root
DB_PASSWORD=
```

Adapter les valeurs selon votre propre environnement MySQL.

### 4. Générer la clé de l'application

```bash
php artisan key:generate
```

### 5. Préparer la base de données

Créer la base de données `gestionpfc` dans MySQL.

Avant d'exécuter les migrations, vérifier les migrations disponibles et la méthode de création de la base de données du projet.

```bash
php artisan migrate
```

Si le projet nécessite un jeu de données initial, importer les données ou exécuter les seeders prévus, selon la configuration du projet.

### 6. Installer les dépendances frontend

```bash
npm install
npm run build
```

### 7. Lancer l'application

```bash
php artisan serve
```

Accéder ensuite à l'application à l'adresse :

http://127.0.0.1:8000

**Remarque :** les étapes d'installation sont indicatives. La configuration de la base de données, les migrations, les éventuels seeders et les ressources frontend doivent être vérifiés selon le contenu réel du dépôt.

## Méthodologie de travail

Le projet a été réalisé en s'appuyant sur la méthodologie **Scrum**, avec une démarche de conception et de développement structurée.


## Compétences mobilisées

- Conception et modélisation UML
- Conception de bases de données relationnelles
- Développement web avec Laravel et PHP
- Manipulation de bases de données MySQL
- Gestion de projet
- Travail collaboratif
- Utilisation de Git et GitHub

## Captures d'écran de l'application
### Page d'accueil

![Page d'accueil de l'application PFC](docs/imagesAPP/Design%20sans%20titre.png)

Interface de l'application


### Organigramme de description de notre application web

![APPLICATION WEB ](docs/imagesAPP/app%20web%20pfc.png)

Autres interfaces


(docs/imagesAPP/09.PNG)


(docs/imagesAPP/NINNI.PNG)


(docs/imagesAPP/22.PNG)
## Dépôt GitHub

[Consulter le code source du projet](https://github.com/ninaHAT08/projet_fin_de_cycle_2024)

---

*Projet académique réalisé en 2024 dans le cadre du Master 2 Génie Logiciel.*
