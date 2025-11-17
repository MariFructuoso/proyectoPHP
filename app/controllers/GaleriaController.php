<?php

namespace dwes\app\controllers;

use dwes\core\Response;

use dwes\app\exceptions\QueryException;
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\CategoriaException;
use dwes\app\exceptions\FileException;
use dwes\app\repository\ImagenesRepository;
use dwes\app\repository\CategoriasRepository;
use dwes\core\App;
use dwes\app\utils\File;
use dwes\app\entity\Imagen;

use Error;

//session_start();

class GaleriaController
{
    /**
     * @throws QueryException
     */
    public function index()
    {
        $imagenes = [];
        $titulo = "";
        $descripcion = "";
        $categoria = 1;

        $errores = $_SESSION['errores_asociados'] ?? [];
        $mensaje = $_SESSION['mensaje_asociados'] ?? "";
        $postRealizado = $_SESSION['post_realizado'] ?? false;

        try {
            $imagenesRepository = App::getRepository(ImagenesRepository::class);
            $categoriasRepository = App::getRepository(CategoriasRepository::class);

            $imagenes = $imagenesRepository->findAll();
            $categorias = $categoriasRepository->findAll();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        } catch (Error $err) {
            $errores[] = $err->getMessage();
        }

        // Limpiar sesión
        /*unset($_SESSION['errores_asociados']);
        unset($_SESSION['mensaje_asociados']);
        unset($_SESSION['post_realizado']);*/

        Response::renderView(
            'galeria',
            'layout',
            compact(
                'imagenes',
                'categoria',
                'categorias',
                'titulo',
                'descripcion',
                'errores',
                'mensaje',
                'postRealizado',
                'imagenesRepository'
            )
        );
    }

    public function nueva()
    {
        $errores = [];
        $mensaje = "";

        try {
            $titulo = trim(htmlspecialchars($_POST['titulo'] ?? ""));
            $descripcion = trim(htmlspecialchars($_POST['descripcion'] ?? ""));

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php

            // Si la categoría está vacía, lanza error y no continua
            $categoria = trim(htmlspecialchars($_POST['categoria']));
            if (empty($categoria))
                throw new CategoriaException;

            // Guarda la IMG en la carpeta de IMAGENES_SUBIDAS
            $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

            // Crea la imagen en la base de datos y recarga la tabla
            $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);

            $imagenesRepository = new ImagenesRepository();
            $imagenesRepository->guarda($imagenGaleria);
            App::get('logger')->add("Se ha guardado una imagen: " . $imagenGaleria->getNombre());

            $imagenes = $imagenesRepository->findAll();

            $mensaje = "Se ha guardado la imagen correctamente";
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        } catch (CategoriaException) {
            $errores[] = "No se ha seleccionado una categoría válida";
        } catch (Error $err) {
            $errores[] = $err->getMessage();
        }

        // Guardar en sesión antes del redirect
        /*$_SESSION['errores_asociados'] = $errores;
        $_SESSION['mensaje_asociados'] = $mensaje;
        $_SESSION['post_realizado'] = true;*/

        App::get('router')->redirect('galeria');
    }

    public function show($id)
    {
        $imagenesRepository = App::getRepository(ImagenesRepository::class);
        $imagen = $imagenesRepository->find($id);
        Response::renderView(
            'imagen-show',
            'layout',
            compact('imagen', 'imagenesRepository')
        );
    }
}
