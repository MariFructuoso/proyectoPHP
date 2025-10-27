<?php
require_once __DIR__ . '/../../core/App.php';
require_once __DIR__ . '/../exceptions/QueryException.class.php';

abstract class QueryBuilder
{
    protected $connection;
    protected $table;
    protected $classEntity;

    public function __construct(string $table, string $classEntity)
    {
        $this->connection = App::getConnection();
        $this->table = $table;
        $this->classEntity = $classEntity;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM $this->table";
        $pdoStatement = $this->connection->prepare($sql);
        if ($pdoStatement->execute() === false) {
            throw new QueryException("No se ha podido ejecutar la query solicitada.");
        }
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classEntity);
    }

    /**
     * @param IEntity $entity
     * @throws QueryException
     */
    public function save(IEntity $entity): void
    {
        try {
            $parametros = $entity->toArray();
            $sql = sprintf(
                'INSERT INTO %s (%s) VALUES (%s)',
                $this->table,
                implode(', ', array_keys($parametros)),
                ':'.implode(', :', array_keys($parametros))
            );
            $statement = $this->connection->prepare($sql);
            $statement->execute($parametros);
        } catch (PDOException $exception) {
            throw new QueryException("Error al insertar en la base de datos.");
        }
    }
}
