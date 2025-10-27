<?php
require_once __DIR__ . '/IEntity.php';
class Imagen implements IEntity
{
    const RUTA_IMAGENES_PORTFOLIO = '/public/images/index/portfolio/';
    const RUTA_IMAGENES_GALERIA = '/public/images/index/gallery/';
    const RUTA_IMAGENES_CLIENTES = '/public/images/clients/';
    const RUTA_IMAGENES_SUBIDAS = '/public/images/subidas/';

    private ?int $id;
    private string $nombre;
    private string $descripcion;
    private int $categoria;
    private int $numVisualizaciones;
    private int $numLikes;
    private int $numDownloads;

    public function __construct(
        string $nombre = "",
        string $descripcion = "",
        int $categoria = 0,
        int $numVisualizaciones = 0,
        int $numLikes = 0,
        int $numDownloads = 0
    ) {
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    public function getId(): ?int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getCategoria(): int { return $this->categoria; }
    public function getNumVisualizaciones(): int { return $this->numVisualizaciones; }
    public function getNumLikes(): int { return $this->numLikes; }
    public function getNumDownloads(): int { return $this->numDownloads; }

    public function setNombre(string $nombre): self { $this->nombre = $nombre; return $this; }
    public function setDescripcion(string $descripcion): self { $this->descripcion = $descripcion; return $this; }
    public function setCategoria(int $categoria): self { $this->categoria = $categoria; return $this; }
    public function setNumVisualizaciones(int $numVisualizaciones): self { $this->numVisualizaciones = $numVisualizaciones; return $this; }
    public function setNumLikes(int $numLikes): self { $this->numLikes = $numLikes; return $this; }
    public function setNumDownloads(int $numDownloads): self { $this->numDownloads = $numDownloads; return $this; }

    public function getUrlPortfolio(): string { return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre(); }
    public function getUrlGaleria(): string { return self::RUTA_IMAGENES_GALERIA . $this->getNombre(); }
    public function getUrlClientes(): string { return self::RUTA_IMAGENES_CLIENTES . $this->getNombre(); }
    public function getUrlSubidas(): string { return self::RUTA_IMAGENES_SUBIDAS . $this->getNombre(); }

    public function __toString(): string { return $this->descripcion; }

    // ===================== IMPLEMENTACIÓN DE IEntity =====================
    public function toArray(): array
    {
        return [
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'categoria' => $this->getCategoria(),
            'numVisualizaciones' => $this->getNumVisualizaciones(),
            'numLikes' => $this->getNumLikes(),
            'numDownloads' => $this->getNumDownloads()
        ];
    }
}
