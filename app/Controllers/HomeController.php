<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig as View;

class HomeController
{
    public function index(Request $request, Response $response, View $view)
    {
        return $view->render($response, 'home/index.twig');
    }
}
