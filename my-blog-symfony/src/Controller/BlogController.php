<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{


    /**
     * Page d'accueil du blog :
     * @Route("/", name="blog_home")
     */
    public function home()
    {
        return $this->render('blog/home.html.twig');
    }

    /**
     * Page liste des articles du blog :
     * @Route("/blog/articles", name="blog_list")
     */
    public function list(ArticleRepository $articleRepository)
    {

        $articles = $articleRepository->findAll();

        return $this->render('blog/list.html.twig',[
            'articles' => $articles
        ]);
    }

    /**
     * Page détail d'un blog :
     * @Route("/blog/article/{id}", name="blog_show", requirements={"id"="\d+"})
     */
    public function show(/*$id, ArticleRepository $articleRepository*/ Article $article)
    {
        // $article = $articleRepository->find($id);

        return $this->render('blog/show.html.twig',[
            'article' => $article
        ]);
    }

    /**
     * Page pour ajouter un article au blog :
     * @Route("/blog/add", name="blog_add")
     *
     * Pour mettre à jour un article existant :
     * @Route("/blog/article/{id}/update", name="blog_update", requirements={"id"="\d+"})
     */
    public function form(Article $article = null, Request $request, ObjectManager $manager)
        {
            if(!$article){
                $article = new Article();
            }


            // fonction spécifique pour créer le formulaire
            // $form = $this->createFormBuilder($article)
            //              ->add('title')
            //              ->add('content')
            //              ->add('image')
            //              ->getForm();

            $form = $this->createForm(ArticleType::class, $article);

            // Pour que le formulaire analyse la requete HTTP passée en paramètre
            $form->handleRequest($request);

            // dump($article);

            // Si le formaulaire est soumis et si le formulaire est valide
            if($form->isSubmitted() && $form->isValid()){
                // Prépare l'article
                $manager->persist($article);
                // Envoie l'article
                $manager->flush();

                // Redirige vers la page de détail de l'article créé
                return $this->redirectToRoute('blog_show', ['id' => $article->getId()]);
            }

            return $this->render('blog/add.html.twig',[
                'formArticle' => $form->createView(),
                'updateMode' => $article->getId() !== null
            ]);
        }

        /**
         * Pour effacer un article du blog :
         * @Route("/blog/article/{id}/delete", name="blog_delete", requirements={"id" = "\d+"})
         */
        public function delete(Article $article, ObjectManager $manager)
        {
            $manager->remove($article);
            $manager->flush();
            return $this->redirectToRoute('blog_list');
        }
}
