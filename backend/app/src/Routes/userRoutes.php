<?php 
use App\Controllers\UserController;
use App\Auth\AuthMiddleware;

$app->get('/usuarios', UserController::class . ':getUsers')->add(new AuthMiddleware());
$app->get('/usuarios/{id}', UserController::class . ':getUser')->add(new AuthMiddleware());
