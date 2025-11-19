<?php
namespace dwes\core;

class Request
{
    public static function uri()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // Eliminar el prefijo /dwes.local
        if (strpos($path, '/dwes.local') === 0) {
            $path = substr($path, strlen('/dwes.local'));
        }
        return trim($path, '/');
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
