<?php

namespace dwes\core\database;

use dwes\app\exceptions\AppException;
use dwes\core\App;
use PDO;
use PDOException;

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
