<?php

use dwes\core\Request;
use dwes\core\App;

require_once 'core/bootstrap.php';

require App::get('router')->direct(Request::uri(), Request::method());