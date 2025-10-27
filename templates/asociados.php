<?php
require_once "../src/utils/file.class.php";
require_once "../src/exceptions/FileException.class.php";
require_once "../src/entity/asociados.class.php";
require_once "../core/App.php";
require_once "../src/exceptions/QueryException.class.php";
require_once __DIR__ . '/../src/repository/asociadosRepository.php';

$errores = [];
$asociados = [];
$mensaje = '';
$nombre = '';
$descripcion = '';

try {
    // Cargar config y ponerla en el contenedor
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config);

    // Obtener la conexión desde el contenedor
    $conexion = App::getConnection();

    // Crear el repositorio
    $asociadosRepository = new AsociadosRepository();

    // Leer todos los asociados
    $asociados = $asociadosRepository->findAll();

    // POST: subir asociado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = trim(htmlspecialchars($_POST['nombre'] ?? ''));
        $descripcion = trim(htmlspecialchars($_POST['descripcion'] ?? ''));

        // Validación nombre obligatorio
        if (empty($nombre)) {
            throw new Exception("El nombre del asociado es obligatorio.");
        }

        // Tipos de archivo permitidos
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];

        // El input del formulario se llama 'logo'
        $logo = new File('logo', $tiposAceptados);

        // Guardamos el logo en la ruta de asociados
        $logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);

        // Creamos el objeto Asociado y lo guardamos en la BBDD
        $asociado = new Asociado($nombre, $logo->getFileName(), $descripcion);
        $asociadosRepository->save($asociado);

        $mensaje = "Asociado registrado correctamente.";

        // Refrescar lista de asociados
        $asociados = $asociadosRepository->findAll();
    }

} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
} catch (Exception $exception) {
    $errores[] = $exception->getMessage();
}

require_once "views/asociados.view.php";
