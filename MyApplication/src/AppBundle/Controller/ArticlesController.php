<?php

namespace AppBundle\Controller;

use  AppBundle\Entity\Article;
use FOS\RestBundle\Controller\FOSRestController;

class ArticlesController extends FOSRestController
{

    /**
     * Note: here the name is important
     * get => the action is restricted to GET HTTP method
     * Article => (without s) generate /articles/SOMETHING
     * Action => standard things for symfony for a controller method which
     *           generate an output
     *
     * it generates so the route GET .../articles/{id}
     *
     * @return Article
     */
    public function getArticleAction(Article $article)
    {
        return $article;
    }

    /**
     * retrieve all articles
     * TODO: add pagination
     *
     * @return Article[]
     */
    public function getArticlesAction()
    {
        $articles = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Article')
            ->findAll();

        return $articles;
    }
}
