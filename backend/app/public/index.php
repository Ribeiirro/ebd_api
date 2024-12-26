<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Carregar as rotas
require __DIR__ . '/../src/Routes/userRoutes.php';

// Rodar a aplicação
$app->run();
