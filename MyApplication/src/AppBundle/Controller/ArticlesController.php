<?php

namespace AppBundle\Controller;

use  AppBundle\Entity\Article;

class ArticlesController
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
    public function getArticleAction($id)
    {
        return new Article("title $id", "body $id");
    }
}
