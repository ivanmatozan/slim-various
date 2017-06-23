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

        $host = $config->get('db.mysql.host');
        $dbname = $config->get('db.mysql.dbname');
        $username = $config->get('db.mysql.username');
        $password = $config->get('db.mysql.password');

        return new \PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
];