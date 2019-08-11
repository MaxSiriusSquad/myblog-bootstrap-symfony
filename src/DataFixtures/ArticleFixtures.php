<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création de 10 articles
        for($i = 1;$i <= 10; $i++){
            $article = new Article();
            $article->setTitle("Titre de l'article numéro $i")
                    ->setContent("Contenu de l'article $i")
                    ->setImage("http://placehold.it/350x150");

            // Préparation à faire persister mon article dans le temps (mais n'existe pas dans la BDD)
            $manager->persist($article);
        }

        // Pour lancer les requêtes sql qui vont tout mettre en place dans la BDD
        $manager->flush();
    }
}
