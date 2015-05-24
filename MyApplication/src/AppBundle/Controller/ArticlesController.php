<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class ArticlesController extends FOSRestController
{

    public function getArticleAction($id)
    {
        return array('hello' => 'world');
    }

}


