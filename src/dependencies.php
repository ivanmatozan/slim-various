<?php

use Psr\Container\ContainerInterface;

$container = $app->getContainer();

// View renderer
$container['view'] = function (ContainerInterface $c) {
    $settings = $c->get('settings')['renderer'];

    $twig = new Slim\Views\Twig($settings['template_path']);

    $twig->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    return $twig;
};