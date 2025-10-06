<?php
require_once __DIR__ . '/../src/entity/imagen.class.php';
$imagenesClientes[]= new Imagen('client1.jpg','MISS BELLA');
$imagenesClientes[]= new Imagen('client2.jpg','DON LUIS');
$imagenesClientes[]= new Imagen('client3.jpg','MISS ARABELLA');
$imagenesClientes[]= new Imagen('client4.jpg','DON LORENZO');

require_once __DIR__ . '/views/about.view.php';