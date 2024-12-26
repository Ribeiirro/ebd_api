<?php 
require '../vendor/autoload.php';

use Slim\Factory\AppFactory;
use App\Config\Database;
use App\Controllers\UserController;

$app = AppFactory::create();

// Conecta ao banco de dados
$db = Database::connect();

// Cria o controlador passando a conexão do banco de dados
$userController = new UserController($db);

// Execute a aplicação
$app->run();
