<?php

use dwes\app\utils\File;
use dwes\app\exceptions\FileException;
use dwes\app\exceptions\AppException;
use dwes\app\entity\Asociado;
use dwes\app\exceptions\QueryException;
use dwes\app\repository\AsociadosRepository;
use dwes\core\App;

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