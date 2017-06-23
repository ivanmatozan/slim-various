<?php

use Interop\Container\ContainerInterface;

return [
    // Router
    \Slim\Interfaces\RouterInterface::class => function (ContainerInterface $container) {
        return $container->get('router');
    },

    // Twig
    \Slim\Views\Twig::class => function (ContainerInterface $container) {
        $twig = new \Slim\Views\Twig(__DIR__ . '/../resources/views');

        $twig->addExtension(new \Slim\Views\TwigExtension(
            $container->get('router'),
            $container->get('request')->getUri()
        ));

        return $twig;
    }
];