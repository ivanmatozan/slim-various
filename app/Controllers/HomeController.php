<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Flash\Messages;
use Slim\Views\Twig as View;
use Slim\Interfaces\RouterInterface as Router;

class HomeController
{
    public function index(Response $response, View $view)
    {
        return $view->render($response, 'home/index.twig');
    }

    public function pivot(Response $response, Messages $flash, Router $router)
    {
        $flash->addMessage('global', 'This is flash message');

        return $response->withRedirect($router->pathFor('home.flash'));
    }

    public function flash(Response $response, View $view)
    {
        return $view->render($response, 'home/flash.twig');
    }
}
