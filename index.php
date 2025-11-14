<?php

use dwes\core\Router;
use dwes\core\Request;

require_once 'core/bootstrap.php';

require Router::load('app/routes.php')->direct(Request::uri(), Request::method());