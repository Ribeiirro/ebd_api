<?php 
namespace App\Auth;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Auth\AuthService;  // Adicionando a importação

class AuthMiddleware {
    public function __invoke(Request $request, Response $response, $next) {
        // Obtém o token do cabeçalho "Authorization"
        $token = $request->getHeaderLine('Authorization');
        
        if (!$token) {
            // Se não houver token, retorna um erro 401
            return $response->withStatus(401)->getBody()->write('Token não fornecido');
        }

        // Verifica o token
        $decoded = AuthService::verifyToken($token);

        if (!$decoded) {
            // Se o token for inválido, retorna um erro 401
            return $response->withStatus(401)->getBody()->write('Token inválido');
        }

        // A requisição continua se o token for válido
        return $next($request, $response);
    }
}
