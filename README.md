# Création d'un blog fonctionnel avec Symfony 4

**!!!WORK IN PROGRESS!!!**

Exercice de création d'un blog fonctionnel avec le framework Symfony 4.

Utilisation d'un thème bootstrap provenant de https://bootswatch.com/

## Eléments du projets

- Une page d'accueil
- Une nav définie dans 'base.html.twig' pour que celle-ci se répète sur toutes les views ({% extends 'base.html.twig' %}), avec la possibilité d'afficher une page avec la liste des articles du blog et la possibilité de créer un nouvel articles. </br>
Aperçu de la page d'accueil : https://github.com/MaxSiriusSquad/myblog-bootstrap-symfony/blob/myblog-v1/public/files/home.pdf
- Une page de liste des articles avec possibilité d'accéder à chacun des articles. </br>
Aperçu de la liste des articles : https://github.com/MaxSiriusSquad/myblog-bootstrap-symfony/blob/myblog-v1/public/files/list.pdf
- Une page de détail de chacun des articles avec la possibilité de modifier ou de supprimer l'article en question. </br>
Aperçu du détail d'un articles :https://github.com/MaxSiriusSquad/myblog-bootstrap-symfony/blob/myblog-v1/public/files/show.pdf </br>
Aperçu du formulaire de modification d'un article : https://github.com/MaxSiriusSquad/myblog-bootstrap-symfony/blob/myblog-v1/public/files/form-update.pdf
- Une page de création d'un article avec un formulaire. </br>
Aperçu du formulaire de création d'un article : https://github.com/MaxSiriusSquad/myblog-bootstrap-symfony/blob/myblog-v1/public/files/form-add.pdf

## Etapes de la création d'un projet Symfony (non exhaustif)

### Création d'un projet Symfony en ligne de commande :
`composer create-project symfony/website-skeleton myproject`

### Lancement d'un serveur local avec la CLI (Command-Line Interface) :
`php bin/console server:run`
(et CTRL+C pour arrêter le serveur)

### Création d'un controller pour gérer les traitements :
`php bin/console make:controller`
=> création d'un controller avec une méthode et une route correspondante (en annotation) ainsi qu'un template Twig correspondant

### Utilisation de l'ORM (Object-Relational Mapping = fait le lien entre mon application et une base de données) Doctrine :

- création d'un fichier .env.dev dans le projet afin de définir les coordonnées de la base de données (BDD) :
*DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name*

- création de la BDD :
`php bin/console doctrine:database:create`

- créer une entité (Entity) <=> une table dans la BDD :
`php bin/console make:entity`
=> Va créer une entité (table) + un repository (pour faire des sélections sur les données de cette table)
=> Création pour chaque entity de ses propriétés en private + les getters (afficher) et les setters (modifier) / pas de setter pour l'id

- créer la migration :
`php bin/console make:migration`
=> Corrige les différences entre les classes de l'application et les tables dans la BDD

- lancer la migration :
`php bin/console doctrine/migrations/migrate`
=> Mise à jour de la BDD

- création de fixtures (script qui permet d'insérer un jeu de fausses données au sein de la BDD) :

    - installation du composant de création :
 `composer require orm-fixtures --dev`
    - création d'une fixture :
 `php bin/console make:fixtures`
    - chargement des fixtures dans la BDD :
 `php bin/console doctrine:fixtures:load`
  => La BDD va être purgée pour insérer les fausses données créées

### Création d'un formulaire :
`php bin/console make:form`

# Version 2

- Ajout des entités Category et Comment et leurs relations avec Article ;
- Utilisations de Faker pour mes fixtures : https://github.com/fzaninotto/Faker ;
- Ajout de ma catégorie ddans le formulaire ;
- Ajout de la catégorie en dynamique sur la liste des articles et le détail d'un article ;
- Ajout de la partie commentaire en dynamiquer sur la vue de détail d'un article ;