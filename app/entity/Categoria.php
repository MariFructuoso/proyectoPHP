<?php
namespace dwes\app\entity;

class Categoria implements IEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var int
     */
    private $numImagenes;

    public function __construct(string $nombre = "", $numImagenes = 0)
    {
        $this->nombre = $nombre;
        $this->numImagenes = $numImagenes;
        $this->id = null;
    }

    /**
     * @return int
     */
    public function getId(): ?int //? significa que puede devolver null
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre(): ?string //? significa que puede devolver null
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Categoria
     */
    public function setNombre(string $nombre): Categoria
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumImagenes(): int
    {
        return $this->numImagenes;
    }

    /**
     * @param int $numImagenes
     * @return Categoria
     */
    public function setNumImagenes(int $numImagenes): Categoria
    {
        $this->numImagenes = $numImagenes;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'numImagenes' => $this->getNumImagenes()
        ];
    }
}
