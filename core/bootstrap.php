<?php
require_once __DIR__ . '/App.php';
require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/NotFoundException.php'; // Añadido para mantener la excepción activa
require __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../app/config.php';

// Guardamos la configuración en el contenedor de servicios
App::bind('config', $config);

$router = Router::load('app/routes.php');
App::bind('router', $router);

$logger = MyLog::load('logs/curso.log');
App::bind('logger',$logger);
