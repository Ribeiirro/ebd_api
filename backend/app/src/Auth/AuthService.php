<?php 
namespace App\Auth;

use Firebase\JWT\JWT;

class AuthService {

    // Gera o token JWT para o usuário
    public static function createToken($user) {
        $key = $_ENV['JWT_SECRET_KEY'];  // A chave secreta agora é carregada do .env
        $payload = [
            'iss' => 'your-domain.com',  // Emissor
            'sub' => $user['id'],        // ID do usuário
            'iat' => time(),             // Data de emissão
            'exp' => time() + 3600,      // Expira em 1 hora
        ];
        return JWT::encode($payload, $key);
    }

    // Verifica o token JWT
    public static function verifyToken($token) {
        try {
            $key = $_ENV['JWT_SECRET_KEY'];  // A chave secreta agora é carregada do .env
            return JWT::decode($token, $key, ['HS256']);
        } catch (\Exception $e) {
            return null;  // Retorna nulo se o token for inválido
        }
    }
}
