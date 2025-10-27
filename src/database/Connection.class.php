<?php
require_once __DIR__ . '/../exceptions/AppException.class.php';
require_once __DIR__ . '/../../core/App.php';

class Connection
{
    /**
     * @return PDO
     * @throws AppException
     */
    public static function make()
    {
        try {
            $config = App::get('config')['database'];
            $connection = new PDO(
                $config['connection'], // ya incluye dbname y charset
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $PDOException) {
            throw new AppException('No se ha podido crear la conexión a la base de datos: ' . $PDOException->getMessage());
        }
        return $connection;
    }
}
