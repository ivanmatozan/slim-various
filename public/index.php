<?php

// Start session
session_start();

// Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Instantiate app
$app = new \App\App();

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();