<?php

declare(strict_types=1);

ini_set('error_reporting', 'E_ALL');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('max_execution_time', '-1');

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/predis/predis/autoload.php';

use App\Controllers\Controller;
use App\Validations\CommandValidation;
use Predis\Autoloader;

Autoloader::register();

try {
    $data = (new CommandValidation($argv));
    $controller = new Controller($data->getCommand());
    var_dump($controller->actionFibonacci($data->getNum(), $data->getTime()));die;
} catch(\Exception $e) {
    echo $e->getMessage();
}