<?php
require_once __DIR__ . '/../database/QueryBuilder.class.php';
require_once __DIR__ . '/../entity/imagen.class.php';

class ImagenRepository extends QueryBuilder
{
    /**
     * Constructor que inicializa la tabla y la clase de entidad
     */
    public function __construct(string $table = 'imagenes', string $classEntity = 'Imagen')
    {
        parent::__construct($table, $classEntity);
    }
}
