<?php

use dwes\app\utils\File;
use dwes\app\exceptions\FileException;
use dwes\app\exceptions\AppException;
use dwes\app\entity\Asociado;
use dwes\app\exceptions\QueryException;
use dwes\app\repository\AsociadosRepository;
use dwes\core\App;

$errores = [];
$asociados = [];
$mensaje = '';
$nombre = '';
$descripcion = '';

try {
    // Cargar config y ponerla en el contenedor
    /* $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config); */

    // Obtener la conexión desde el contenedor
    $conexion = App::getConnection();

    // Crear el repositorio
    $asociadosRepository = new AsociadosRepository();

    // Leer todos los asociados
    $asociados = $asociadosRepository->findAll();

} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
} catch (Exception $exception) {
    $errores[] = $exception->getMessage();
}

require_once __DIR__ . '/../views/asociados.view.php';
