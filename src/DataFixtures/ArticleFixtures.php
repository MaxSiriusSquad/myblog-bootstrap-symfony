<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Installer Faker : composer require fzaninotto/faker
        // Documentation : https://github.com/fzaninotto/Faker
        // Instance de la classe Faker pour avoir des fausses données en français
        $faker = Factory::create('fr_FR');

        // Créer 3 fausses catégories :
        for ($i=0; $i <= 3; $i++) {

            // Nouvel objet de la classe Category :
            $category = new Category();

            // Je génère de fausses données pour chacune des propriétés :
            $category->setName($faker->sentence()) // phrase de 6 mots par défaut
                     ->setDescription($faker->paragraph()); // paragraphe de 3 phrases par défaut

            // Préparation à faire persister la catégorie
            $manager->persist($category);

            // Créer entre 4 et 6 faux articles dans chaque fausse catégorie
            for($j = 1;$j <= mt_rand(4, 6); $j++){

                // Nouvel objet de la classe Article
                $article = new Article();

                // Je définis le contenu d'un article dans $content
                $content = join($faker->paragraphs(5));

                $article->setTitle($faker->sentence()) // phrase de 6 mots par défaut
                        ->setContent($content) // paragraphes paramétrés dans $content
                        ->setImage($faker->imageUrl($width = 1080, $height = 560)) // une URL
                        ->setCreatedAt($faker->dateTimeBetween('-6 months')) // une date entre il y a 6 mois et aujourd'hui
                        ->setCategory($category); // je place mes articles dans cette category

                // Préparation à faire persister l'article
                $manager->persist($article);

                // Je donne entre 3 et 5 faux commentaires par faux article
                for ($k=0; $k <= mt_rand(3, 5) ; $k++) {

                    // Nouvel objet de la classe Article
                    $comment = new Comment();

                    // Je définis le contenu d'un commentaire dans $content
                    $content = join($faker->paragraphs(2));

                    // Donner une date au commentaire sans que cette date soit antérieure à la date de création de l'article (logique!)
                    // Je prends en référence la date d'aujourd'hui et puis la date de l'article.
                    // new \DateTime() : Date d'aujourd'hui
                    $days = (new \DateTime())->diff($article->getCreatedAt())->days; // diff() récupère la différence entre 2 objets DateTime, donc ici entre la date d'aujourd'hui et la date de création de l'article

                    $comment->setAuthor($faker->name()) // un nom
                            ->setContent($content) // paragraphes paramétrés dans $content
                            ->setCreatedAt($faker->dateTimeBetween('-' . $days . 'days')) // donc une date entre il y a 100 jours et aujourd'hui par exemple
                            ->setArticle($article); // je place mes commentaires dans cet article

                    // Préparation à faire persister le commentaire
                    $manager->persist($comment);
                }
            }
        }

        // Pour lancer les requêtes sql qui vont tout mettre en place dans la BDD
        $manager->flush();
    }
}
