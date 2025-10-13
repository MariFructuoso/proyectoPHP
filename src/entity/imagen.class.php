<?php
class imagen
{
    const RUTA_IMAGENES_PORTFOLIO = '/public/images/index/portfolio/';
    const RUTA_IMAGENES_GALERIA = '/public/images/index/gallery/';
    const RUTA_IMAGENES_CLIENTES = '/public/images/clients/';
    const RUTA_IMAGENES_SUBIDAS='/public/images/subidas/';
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var string
     */
    private $descripcion;
    /**
     * @var int
     */
    private $categoria;
    /**
     * @var int
     */
    private $numVisulizaciones;
    /**
     * @var int
     */
    private $numLikes;
    /**
     * @var int
     */
    private $numDownloads;

    /**
     * @param string $nombre
     * @param string $descripcion
     * @param int $categoria
     * @param int $numVisualizaciones
     * @param int $numLikes
     * @param int $numDownloads
     */

    public function __construct(string $nombre = "", string $descripcion = "", int $categoria = 0, int $numVisulizaciones = 0, int $numLikes = 0, int $numDownloads = 0)
    {
        $this->id = null;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisulizaciones = $numVisulizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }
    /**
     * @return int
     */
    public function getID(): ?int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }
    /**
     * @return string
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }
    /**
     * @return int
     */
    public function getCategoria(): ?int
    {
        return $this->categoria;
    }
    /**
     * @return int
     */
    public function getNumVisualizaciones(): ?int
    {
        return $this->numVisulizaciones;
    }
    /**
     * @return int
     */
    public function getNumLikes(): ?int
    {
        return $this->numLikes;
    }
    /**
     * @return int
     */
    public function getNumDownloads(): ?int
    {
        return $this->numDownloads;
    }



    /**
     * @param string $nombre
     * @return Imagen
     */
    public function setNombre(string $nombre): Imagen
    {
        $this->nombre = $nombre;
        return $this;
    }
    /**
     * @param string $descripcion
     * @return Imagen
     */
    public function setDescripcion(string $descripcion): Imagen
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @param int $categoria
     * @return Imagen
     */
    public function setCategoria(int $categoria): Imagen
    {
        $this->categoria = $categoria;
        return $this;
    }
    /**
     * @param int $numVisualizaciones
     * @return Imagen
     */
    public function setNumVisualizaciones(int $numVisualizaciones): Imagen
    {
        $this->numVisulizaciones = $numVisualizaciones;
        return $this;
    }
    /**
     * @param int $numLikes
     * @return Imagen
     */
    public function setNumLikes(int $numLikes): Imagen
    {
        $this->numLikes = $numLikes;
        return $this;
    }
    /**
     * @param int $numDownloads
     * @return Imagen
     */
    public function setNumDownloads(int $numDownloads): Imagen
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    public function getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }
    public function getUrlGaleria(): string
    {
        return self::RUTA_IMAGENES_GALERIA . $this->getNombre();
    }
    public function getUrlClientes(): string
    {
        return self::RUTA_IMAGENES_CLIENTES . $this->getNombre();
    }
    public function getUrlSubidas(): string
    {
        return self::RUTA_IMAGENES_SUBIDAS . $this->getNombre();
    }
    public function __toString(): string
    {
        #return $this->getDescripcion();
        return $this->descripcion;
    }
}
