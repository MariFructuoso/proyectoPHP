<?php
require_once __DIR__ . '/IEntity.php';

class Asociado implements IEntity
{
  const RUTA_LOGOS_ASOCIADOS = '/public/images/asociados/';

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
  private $logo;
  /**
   * @var string
   */
  private $descripcion;

  /**
   * @param string $nombre
   * @param string $logo
   * @param string $descripcion
   */
  public function __construct(string $nombre = "", string $logo = "", string $descripcion = "")
  {
    $this->id = null;
    $this->nombre = $nombre;
    $this->logo = $logo;
    $this->descripcion = $descripcion;
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
  public function getLogo(): ?string
  {
    return $this->logo;
  }
  /**
   * @return string
   */
  public function getDescripcion(): ?string
  {
    return $this->descripcion;
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
   * @param string $logo
   * @return Asociado
   */
  public function setLogo(string $logo): Asociado
  {
      $this->logo = $logo;
      return $this;
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

  public function getUrlLogo(): string
  {
    return self::RUTA_LOGOS_ASOCIADOS . $this->getLogo();
  }

  public function __toString(): string
  {
    return $this->descripcion;
  }

  // ===================== IMPLEMENTACIÓN DE IEntity =====================
  public function toArray(): array
  {
      return [
          'nombre' => $this->getNombre(),
          'logo' => $this->getLogo(),
          'descripcion' => $this->getDescripcion()
      ];
  }
}
?>

