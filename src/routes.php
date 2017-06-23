<?php

$app->get('/', ['\App\Controllers\HomeController', 'index'])->setName('home');

$app->group('/users', function () {
    $this->get('', ['\App\Controllers\UserController', 'show'])->setName('user.show');
    $this->get('/{id}', ['\App\Controllers\UserController', 'profile'])->setName('user.profile');
});
