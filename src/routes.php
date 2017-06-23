<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $request, Response $response, $args) {
    return $this->view->render($response, 'home.twig');
})->setName('home');

$app->get('/profile/{username}', function (Request $request, Response $response, $args) {
    $username = $args['username'];
    return $this->view->render($response, 'profile.twig', compact('username'));
})->setName('user.profile');