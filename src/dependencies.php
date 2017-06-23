<?php

// Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

$app = new Slim\App();

$container = $app->getContainer();

$container['view'] = function (\Psr\Container\ContainerInterface $c) {
    $twig = new Slim\Views\Twig(__DIR__ . '/../resources/views');
    $twig->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    return $twig;
};

// Routes file
require 'routes.php';