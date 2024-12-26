<?php 
namespace App\Services;

use App\Models\User;

class UserService {
    protected $userModel;

    public function __construct($db) {
        $this->db = $db;
        $this->userModel = new User($db);  // Passa a conexão para o modelo User
    }

    public function getAllUsers() {
        return $this->userModel->getAllUsers();
    }

    public function getUserById($id) {
        return $this->userModel->getUserById($id);
    }
}
