<?php

require_once '../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

require_once '../routes/web.php';

$router->dispatch();