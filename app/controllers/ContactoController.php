<?php

namespace dwes\app\controllers;

use dwes\core\Response;

class ContactoController
{
    public function contact()
    {
        Response::renderView(
            'contact',
            'layout-with-footer'
        );
    }

    public function enviar()
    {
        require __DIR__ . '/../views/contact_enviar.php';
    }
}
