<?php

use Slim\App;
use App\Controllers\UserController;

return function (App $app) {
    $app->get('/usuarios', [UserController::class, 'getAll']);
};

//use App\Controllers\UserController;
//use App\Auth\AuthMiddleware;

//$app->get('/usuarios', UserController::class . ':getUsers')->add(new AuthMiddleware());
//$app->get('/usuarios/{id}', UserController::class . ':getUser')->add(new AuthMiddleware());
