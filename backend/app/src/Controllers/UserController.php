<?php 
namespace App\Controllers;

use App\Models\User;

class UserController {

    private $db;
    private $userModel;

    // Construtor que recebe a conexão com o banco de dados
    public function __construct($db) {
        $this->db = $db;
        $this->userModel = new User($db);  // Passa a conexão para o modelo User
    }

    // Método para retornar todos os usuários
    public function getUsers($request, $response, $args) {
        $users = $this->userModel->getAllUsers();
        return $response->withJson($users);
    }

    // Método para retornar um usuário específico
    public function getUser($request, $response, $args) {
        $user = $this->userModel->getUserById($args['id']);
        if (!$user) {
            return $response->withStatus(404)->write('Usuário não encontrado');
        }
        return $response->withJson($user);
    }
}
