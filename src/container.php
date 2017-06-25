<?php

use Interop\Container\ContainerInterface;

return [
    // Router
    \Slim\Interfaces\RouterInterface::class => function (ContainerInterface $container) {
        return $container->get('router');
    },

    // Flash messages
    \Slim\Flash\Messages::class => function (ContainerInterface $container) {
        return new Slim\Flash\Messages();
    },

    // Custom 404 page
    'notFoundHandler' => function (ContainerInterface $container) {
        return function ($request, $response) use ($container) {
            $container->get(\Slim\Views\Twig::class)->render($response, 'errors/404.twig');

            return $response->withStatus(404);
        };
    },

    // Twig
    \Slim\Views\Twig::class => function (ContainerInterface $container) {
        $twig = new \Slim\Views\Twig(__DIR__ . '/../resources/views');

        $twig->addExtension(new \Slim\Views\TwigExtension(
            $container->get('router'),
            $container->get('request')->getUri()
        ));

        // Add flash messages as Twig global variable
        $twig->getEnvironment()->addGlobal('flash', $container->get(\Slim\Flash\Messages::class));

        return $twig;
    },

    // Config
    \Noodlehaus\Config::class => function (ContainerInterface $container) {
        return new \Noodlehaus\Config([
            __DIR__ . '/../src/config.php'
        ]);
    },

    //PDO
    \PDO::class => function (ContainerInterface $container) {
        $config = $container->get(\Noodlehaus\Config::class);

        $driver = $config->get('db.mysql.driver');
        $host = $config->get('db.mysql.host');
        $database = $config->get('db.mysql.database');
        $username = $config->get('db.mysql.username');
        $password = $config->get('db.mysql.password');

        return new \PDO("{$driver}:host={$host};dbname={$database}", $username, $password);
    }
];