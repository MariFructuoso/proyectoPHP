<?php
use dwes\app\exceptions\NotFoundException;
use dwes\core\Router;
use dwes\core\Request;

try {
    require_once 'core/bootstrap.php';

    require Router::load('app/routes.php')->direct(Request::uri(), Request::method());
} catch (NotFoundException $notFoundException) {
    die($notFoundException->getMessage());
}