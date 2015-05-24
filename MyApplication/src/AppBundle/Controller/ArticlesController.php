<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Form\ArticleType;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     *
     */
    public function postArticlesAction(Request $request)
    {
        //TODO: there's a simpler method using FOSRestBundle body converter

        // that's the reason why we need to be able to create
        // an article without body or title, to use it as
        // a placeholder for the form
        $article = new Article();
        // createForm is provided by the parent class
        $form = $this->createForm(
            new ArticleType(),
            $article
        );
        // this method is the one that will use the value in the POST
        // to update $article
        $form->handleRequest($request);

        // we use it like that instead of the standard $form->isValid()
        // because the json generated
        // is much readable than the one by serializing $form->getErrors()
        $errors = $this->get('validator')->validate($article);
        if (count($errors) > 0) {
            return new View(
                $errors,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($article);
        $manager->flush();

        // created => 201
        return new View($article, Response::HTTP_CREATED);
    }
}
