<?php 
// src/Utils/Response.php
namespace App\Utils;

class Response {
    public static function json($response, $data, $status = 200) {
        return $response->withHeader('Content-Type', 'application/json')
                        ->withStatus($status)
                        ->write(json_encode($data));
    }
}
