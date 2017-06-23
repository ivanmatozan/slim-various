<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Flash\Messages;
use Slim\Views\Twig as View;
use Slim\Interfaces\RouterInterface as Router;

class HomeController
{
    public function index(Request $request, Response $response, View $view)
    {
        return $view->render($response, 'home/index.twig');
    }

    public function pivot(Request $request, Response $response, View $view, Messages $flash, Router $router)
    {
        $flash->addMessage('global', 'This is flash message');

        return $response->withRedirect($router->pathFor('home.flash'));
    }

    public function flash(Request $request, Response $response, View $view)
    {
        return $view->render($response, 'home/flash.twig');
    }
}
