<?php
require_once "../src/utils/file.class.php";
require_once "../src/exceptions/FileException.class.php";
require_once "../src/entity/imagen.class.php";
require_once "../core/App.php"; // para usar el contenedor y la conexión
require_once "../src/exceptions/QueryException.class.php";
require_once __DIR__ . '/../src/repository/imagenRepository.php';

$errores = [];
$imagenes = [];
$mensaje = '';
$titulo = '';
$descripcion = '';

try {
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config);

    $conexion = App::getConnection();

    $imagenRepository = new ImagenRepository();

    $imagenes = $imagenRepository->findAll();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);

        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

        $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion);

        $imagenRepository->save($imagenGaleria);

        $mensaje = "Se ha guardado la imagen correctamente";

        $imagenes = $imagenRepository->findAll();
    }

} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
}

// Cargar la vista
require_once "views/galeria.view.php";
