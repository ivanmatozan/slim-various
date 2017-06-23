<?php

namespace App;

use DI\ContainerBuilder;

class App extends \DI\Bridge\Slim\App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        // Include Slim settings
        $builder->addDefinitions(__DIR__ . '/../src/settings.php');

        // Include Containers
        $builder->addDefinitions(__DIR__ . '/../src/container.php');
    }
}