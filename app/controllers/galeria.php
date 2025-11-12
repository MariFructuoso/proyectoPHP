<?php
$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";
try {
    $imagenesRepository = new ImagenesRepository();
    $categoriasRepository = new CategoriasRepository();
    $imagenes = $imagenesRepository->findAll();
    $categorias = $categoriasRepository->findAll();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
}
require_once __DIR__ . '/../views/galeria.view.php';