<?php

// Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Instantiate app
$settings = require __DIR__ . '/../src/settings.php';
$app = new Slim\App($settings);

// Setup dependencies
require __DIR__ . '/../src/dependencies.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();