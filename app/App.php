<?php

namespace App;

use DI\ContainerBuilder;

class App extends \DI\Bridge\Slim\App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        // Slim settings
        $builder->addDefinitions([
            'settings.displayErrorDetails' => true,
            'settings.addContentLengthHeader' => false
        ]);

        // Include Containers
        $builder->addDefinitions(__DIR__ . '/../src/container.php');
    }
}