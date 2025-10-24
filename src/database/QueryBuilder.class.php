<?php
require_once __DIR__ . '/../exceptions/QueryException.class.php';
require_once __DIR__ . '/../entity/imagen.class.php';

class QueryBuilder
{
    /**
     * @var PDO
     */
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Obtiene todos los registros de una tabla y devuelve un array de objetos.
     *
     * @param string $tabla
     * @param string $classEntity
     * @return arrayxa
     * @throws QueryException
     */
    public function findAll(string $tabla, string $classEntity): array
    {
        $sql = "SELECT * FROM $tabla";
        $pdoStatement = $this->connection->prepare($sql);

        if ($pdoStatement->execute() === false) {
            throw new QueryException("No se ha podido ejecutar la query solicitada.");
        }

        // Convierte cada fila en un objeto de la clase indicada
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $classEntity);
    }
}
