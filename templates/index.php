<?php

require_once __DIR__ . '/../src/entity/imagen.class.php';
require_once __DIR__ . '/../src/entity/asociados.class.php';

$imagenesHome[]= new Imagen ('1.jpg','descripción imagen 1',1,456,6102,130);
$imagenesHome[]= new Imagen ('2.jpg','descripción imagen 2',1,46,61630,1340);
$imagenesHome[]= new Imagen ('3.jpg','descripción imagen 3',1,4556,63410,3320);
$imagenesHome[]= new Imagen ('4.jpg','descripción imagen 4',1,4556,6133,456);
$imagenesHome[]= new Imagen ('5.jpg','descripción imagen 5',1,436,9513,870);
$imagenesHome[]= new Imagen ('6.jpg','descripción imagen 6',1,4536,6140,560);
$imagenesHome[]= new Imagen ('7.jpg','descripción imagen 7',1,4568,610,130);
$imagenesHome[]= new Imagen ('8.jpg','descripción imagen 8',1,4656,710,230);
$imagenesHome[]= new Imagen ('9.jpg','descripción imagen 9',1,765,610,874);
$imagenesHome[]= new Imagen ('10.jpg','descripción imagen 10',1,457,5670,134);
$imagenesHome[]= new Imagen ('11.jpg','descripción imagen 11',1,786,6741,345);
$imagenesHome[]= new Imagen ('12.jpg','descripción imagen 12',1,346,610,5894);



$logos[] = new Asociado('log1','log1.jpg','descripcion logo 1');
$logos[] = new Asociado('log2','log2.jpg','descripcion logo 2');
$logos[] = new Asociado('log3','log3.jpg','descripcion logo 3');

require_once __DIR__ . '/views/index.view.php';
