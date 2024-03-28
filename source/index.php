<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

function autoloader($class) {
    $dirs = ['/','/controllers','/src/main','/src/engine','/views','/model', '/src'];
    foreach ($dirs as $d) {
        $file = __DIR__ . '/' . $d . '/' . $class . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }
    }
}
spl_autoload_register('autoloader');

$app = AppFactory::create();

$app->get('/', 'ControllerGet:getIndex');

$app->run();
