<?php
require_once __DIR__ . '/../../src/database/QueryBuilder.class.php';
require_once __DIR__ . '/../entity/asociados.class.php';

class AsociadosRepository extends QueryBuilder
{
    public function __construct(string $table = 'asociados', string $classEntity = 'Asociado')
    {
        parent::__construct($table, $classEntity);
    }
}
