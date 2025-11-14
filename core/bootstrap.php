<?php

namespace dwes\core;

use dwes\core\App;
use dwes\core\Request;
use dwes\core\Router;

require __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../app/config.php';

// Guardamos la configuración en el contenedor de servicios
App::bind('config', $config);

$router = Router::load('app/routes.php');
App::bind('router', $router);
