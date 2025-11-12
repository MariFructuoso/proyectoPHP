<?php

require_once __DIR__ . '/../../src/utils/file.class.php';
require_once __DIR__ . '/../../src/exceptions/FileException.class.php';
require_once __DIR__ . '/../../src/entity/asociados.class.php';
require_once __DIR__ . '/../../src/exceptions/QueryException.class.php';
require_once __DIR__ . '/../../src/repository/asociadosRepository.php';

try {
    $asociadosRepository = new AsociadosRepository();

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

    // Validar que se obtuvo un nombre de archivo
    if (empty($logo->getFileName())) {
        throw new FileException("No se pudo obtener el nombre del archivo subido");
    }

    // Creamos el objeto Asociado y lo guardamos en la BBDD
    $asociado = new Asociado($nombre, $logo->getFileName(), $descripcion);

    $asociadosRepository->save($asociado);

} catch (FileException | QueryException | Exception $e) {
    // Aquí podrías guardar el error en una sesión para mostrarlo en la página de asociados
    // $_SESSION['errores_asociados'] = $e->getMessage();
}

App::get('router')->redirect('asociados');