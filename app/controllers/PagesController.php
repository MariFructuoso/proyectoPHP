<?php

namespace dwes\app\controllers;

use dwes\app\entity\Imagen;
use dwes\app\entity\Asociado;
use dwes\core\Response;

class PagesController
{
    /**
     * @throws QueryException
     */
    public function index()
    {
        // Esta sería la forma de obtener el array de imágenes a partir de la base de datos:
        //$imagenGaleria = App::getRepository( ImagenGaleriaRepository::class)->findAll();
        //$asociadosLista = App::getRepository( AsociadosRepository::class)->findAll();
        // Forma estática de crear los arrays de imágenes:
        $imagenesHome[] = new Imagen('1.jpg', 'descripción imagen 1', 1, 845, 372, 156);
        $imagenesHome[] = new Imagen('2.jpg', 'descripción imagen 2', 1, 213, 984, 742);
        $imagenesHome[] = new Imagen('3.jpg', 'descripción imagen 3', 1, 678, 415, 289);
        $imagenesHome[] = new Imagen('4.jpg', 'descripción imagen 4', 1, 991, 532, 603);
        $imagenesHome[] = new Imagen('5.jpg', 'descripción imagen 5', 2, 154, 877, 920);
        $imagenesHome[] = new Imagen('6.jpg', 'descripción imagen 6', 2, 707, 268, 318);
        $imagenesHome[] = new Imagen('7.jpg', 'descripción imagen 7', 2, 932, 641, 475);
        $imagenesHome[] = new Imagen('8.jpg', 'descripción imagen 8', 2, 118, 994, 182);
        $imagenesHome[] = new Imagen('9.jpg', 'descripción imagen 9', 3, 863, 209, 947);
        $imagenesHome[] = new Imagen('10.jpg', 'descripción imagen 10', 3, 276, 788, 324);
        $imagenesHome[] = new Imagen('11.jpg', 'descripción imagen 11', 3, 645, 569, 808);
        $imagenesHome[] = new Imagen('12.jpg', 'descripción imagen 12', 3, 507, 913, 137);

        $imgAsociados[] = new Asociado('Asociado_1_name', 'log1.jpg', 'logo');
        $imgAsociados[] = new Asociado('Asociado_2_name', 'log2.jpg', 'logo');
        $imgAsociados[] = new Asociado('Asociado_3_name', 'log3.jpg', 'logo');
        $imgAsociados[] = new Asociado('Asociado_4_name', 'log4.jpg', 'logo');

        Response::renderView(
            'index',
            'layout',
            compact ( 'imagenesHome','imgAsociados')
            );
    }
    public function about()
    {
        $imagenesClientes[] = new Imagen('client1.jpg', 'MISS BELLA');
        $imagenesClientes[] = new Imagen('client2.jpg', 'DON PENO');
        $imagenesClientes[] = new Imagen('client3.jpg', 'SWEETY');
        $imagenesClientes[] = new Imagen('client4.jpg', 'LADY');

        require __DIR__ . '/../views/about.view.php';
    }
    public function blog()
    {
        require __DIR__ . '/../views/blog.view.php';
    }
    public function post()
    {
        require __DIR__ . '/../views/single_post.view.php';
    }
    public function contact()
    {
        require __DIR__ . '/../views/contact.view.php';
    }
}
