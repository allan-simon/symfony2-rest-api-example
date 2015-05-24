<?php

namespace AppBundle\Controller;

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
     */
    public function getArticleAction($id)
    {
        return array('hello' => 'world');
    }
}
