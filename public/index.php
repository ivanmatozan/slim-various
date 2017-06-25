<?php

// Start session
session_start();

// Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

// Instantiate app
$app = new \App\App();

$container = $app->getContainer();
$config = $container->get(\Noodlehaus\Config::class);

// Boot Eloquent
$capsule = new \Illuminate\Database\Capsule\Manager();
$capsule->addConnection($config->get('db.mysql'));
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();