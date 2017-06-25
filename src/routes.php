<?php

$app->group('/', function () {
    $this->get('', ['\App\Controllers\HomeController', 'index'])->setName('home');
    $this->get('flash', ['\App\Controllers\HomeController', 'flash'])->setName('home.flash');
    $this->get('pivot', ['\App\Controllers\HomeController', 'pivot'])->setName('home.pivot');
});

$app->group('/users', function () {
    $this->get('', ['\App\Controllers\UserController', 'index'])->setName('user.index');
    $this->get('/show', ['\App\Controllers\UserController', 'show'])->setName('user.show');
    $this->get('/test', ['\App\Controllers\UserController', 'test'])->setName('user.test');
    $this->get('/{id}', ['\App\Controllers\UserController', 'profile'])->setName('user.profile');
});
