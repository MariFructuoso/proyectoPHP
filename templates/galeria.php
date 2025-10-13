<?php
require_once "../src/utils/file.class.php";
require_once "../src/exceptions/FileException.class.php";
require_once '../src/entity/imagen.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $titulo = trim(htmlspecialchars($_POST['titulo']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php
        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS );

        $mensaje = "Datos enviados";
    } catch (FileException $fileException) {
        $errores[] = $fileException->getMessage();
    }
} else {
    $errores = [];
    $titulo = "";
    $descripcion = "";
    $mensaje = "";
}

require_once "views/galeria.view.php";
