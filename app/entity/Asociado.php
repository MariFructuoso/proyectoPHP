<?php
namespace dwes\app\entity;

class Asociado implements IEntity
{
    const RUTA_LOGOS_ASOCIADOS = '/dwes.local/public/images/asociados/';

    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $descripcion;

    public function __construct(string $nombre = "", $logo = "", $descripcion = "")
    {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
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
     * @return Asociado
     */
    public function setNombre(string $nombre): Asociado
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return Asociado
     */
    public function setLogo(string $logo): Asociado
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Asociado
     */
    public function setDescripcion(string $descripcion): Asociado
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function __toString(): string
    {
        return $this->descripcion;
    }

    public function getUrl(): string
    {
        return self::RUTA_LOGOS_ASOCIADOS . $this->getLogo();
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'logo' => $this->getLogo(),
            'descripcion' => $this->getDescripcion()
        ];
    }
}
