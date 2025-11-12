<?php
class utils
{
    public static function esOpcionMenuActiva($opcion):bool
    {
        $uri = $_SERVER['REQUEST_URI'];
        // Eliminar query string si existe
        if (($pos = strpos($uri, '?')) !== false) {
            $uri = substr($uri, 0, $pos);
        }
        // Eliminar base URL si existe
        $baseUrl = '/dwes.local';
        if (strpos($uri, $baseUrl) === 0) {
            $uri = substr($uri, strlen($baseUrl));
        }
        // Eliminar barras al inicio y final
        $uri = trim($uri, '/');
        
        return $uri === $opcion;
    }
}
