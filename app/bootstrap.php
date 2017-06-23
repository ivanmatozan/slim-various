<?php

// Composer autoloader
require __DIR__ . '/../vendor/autoload.php';

$app = new Slim\App();

// Routes file
require 'routes.php';