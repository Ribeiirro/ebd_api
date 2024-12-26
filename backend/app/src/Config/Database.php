<?php
namespace App\Config;

use Dotenv\Dotenv;
use PDO;

class Database {
    public static function connect() {
        // Carregar o arquivo .env
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        // Acesso às variáveis de ambiente carregadas
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];

        // Criar a conexão PDO
        return new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    }
}
