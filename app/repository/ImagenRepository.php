<?php

namespace dwes\app\repository;

use dwes\core\database\QueryBuilder;
use dwes\app\entity\Imagen;

class ImagenRepository extends QueryBuilder
{
    /**
     * Constructor que inicializa la tabla y la clase de entidad
     */
    public function __construct(string $table = 'imagenes', string $classEntity = Imagen::class)
    {
        parent::__construct($table, $classEntity);
    }
}
