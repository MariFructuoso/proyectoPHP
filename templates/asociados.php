<?php
require_once "../src/utils/file.class.php";
require_once "../src/exceptions/FileException.class.php";
require_once '../src/entity/asociados.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nombre = trim(htmlspecialchars($_POST['nombre'] ?? ''));
        $descripcion = trim(htmlspecialchars($_POST['descripcion'] ?? ''));

        //validacion nombre obligatorio
        if (empty($nombre)) {
            throw new Exception("El nombre del asociado es obligatorio.");
        }

        // Tipos de archivo permitidos (igual que en galería)
        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];

        // El input del formulario se llama 'logo'
        $logo = new File('logo', $tiposAceptados);

        // Guardamos el logo en la ruta de asociados
        $logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);

        $mensaje = "Asociado registrado correctamente.";
    } catch (FileException $fileException) {
        $errores[] = $fileException->getMessage();
    } catch (Exception $exception) {
        $errores[] = $exception->getMessage();
    }
} else {
    $errores = [];
    $titulo = "";
    $descripcion = "";
    $mensaje = "";
}

require_once "views/asociados.view.php";
