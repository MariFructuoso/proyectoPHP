<?php

namespace dwes\app\controllers;

use dwes\core\Response;

use dwes\app\exceptions\QueryException;
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\FileException;
use dwes\app\repository\AsociadosRepository;
use dwes\core\App;
use dwes\app\utils\File;
use dwes\app\entity\Asociado;

use Error;

//session_start();

class AsociadosController
{
    /**
     * @throws QueryException
     */
    public function index()
    {
        $imagenesAsoc = [];
        $nombre = "";
        $descripcion = "";

        $errores = $_SESSION['errores_asociados'] ?? [];
        $mensaje = $_SESSION['mensaje_asociados'] ?? "";
        $postRealizado = $_SESSION['post_realizado'] ?? false;

        try {
            $asociadosRepository = App::getRepository(AsociadosRepository::class);
            $imagenesAsoc = $asociadosRepository->findAll();
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
            'asociados',
            'layout',
            compact(
                'imagenesAsoc',
                'nombre',
                'descripcion',
                'errores',
                'mensaje',
                'postRealizado',
                'asociadosRepository'
            )
        );
    }

    public function nuevo()
    {
        $errores = [];
        $mensaje = "";

        try {
            // Si el CAPTCHA está vacío, lanza error y no continua
            if (!isset($_POST['captcha']) || $_POST['captcha'] == "")
                throw new Error("Introduzca el CAPTCHA de seguridad.");

            // Si el CAPTCHA no coincide, lanza error y no continua
            /*if ( $_SESSION['captchaGenerado'] != $_POST['captcha'] )
                throw new Error("¡CAPTCHA de seguridad incorrecto! Inténtelo de nuevo.");*/

            // Si el CAPTCHA es correcto, pasa a crear el asociado
            $nombre = trim(htmlspecialchars($_POST['nombre'] ?? ""));
            $descripcion = trim(htmlspecialchars($_POST['descripcion'] ?? ""));

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imgAsoc', $tiposAceptados);

            // Si el nombre está vacío, lanza error y no continua
            if ($nombre === "") {
                throw new Error("El título no puede estar vacío");
            }

            // Guarda la IMG en la carpeta de LOGOS_ASOCIADOS
            $imagen->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);

            // Crea el asociado en la base de datos y recarga la tabla
            $imagenGaleria = new Asociado($nombre, $imagen->getFileName(), $descripcion);

            $asociadosRepository = App::getRepository(AsociadosRepository::class);
            $asociadosRepository->save($imagenGaleria);
            $asociadosRepository->findAll();

            $mensaje = "Se ha guardado el asociado correctamente";
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        } catch (Error $err) {
            $errores[] = $err->getMessage();
        }

        // Guardar en sesión antes del redirect
        /*$_SESSION['errores_asociados'] = $errores;
        $_SESSION['mensaje_asociados'] = $mensaje;
        $_SESSION['post_realizado'] = true;*/

        App::get('router')->redirect('asociados');
    }
}
