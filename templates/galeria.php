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
    // Paso 1: cargar config y ponerla en el contenedor
    $config = require_once __DIR__ . '/../app/config.php';
    App::bind('config', $config);

    // Paso 2: obtener la conexión desde el contenedor
    $conexion = App::getConnection();

    // Crear el repositorio de imágenes
    $imagenRepository = new ImagenRepository();

    // Leer todas las imágenes para mostrarlas
    $imagenes = $imagenRepository->findAll();

    // POST: subir imagen
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);

        // Guardar la imagen en la carpeta de subidas
        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

        // Crear objeto Imagen con el nombre y descripción
        $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion);

        // Guardar en la base de datos usando el repositorio
        $imagenRepository->save($imagenGaleria);

        $mensaje = "Se ha guardado la imagen correctamente";

        // Refrescar lista de imágenes
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
