<?php
require_once __DIR__ . '/../src/exceptions/AppException.class.php';
require_once __DIR__ . '/../src/database/Connection.class.php';

class App
{
    /**
     * @var array
     */
    private static $container = [];

    public static function bind(string $key, $value)
    {
        static::$container[$key] = $value;
    }

    public static function get(string $key)
    {
        if (!array_key_exists($key, static::$container)) {
            throw new AppException("No se ha encontrado la clave $key en el contenedor");
        }
        return static::$container[$key];
    }

    /**
     * @return PDO
     * @throws AppException
     */
    public static function getConnection()
    {
        if (!array_key_exists('connection', static::$container)) {
            static::$container['connection'] = Connection::make();
        }
        return static::$container['connection'];
    }
}
