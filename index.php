<?php

declare(strict_types=1);

ini_set('error_reporting', 'E_ALL');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('max_execution_time', '-1');

use App\Controllers\Controller;
use App\Validations\CommandValidation;

require_once __DIR__ . '/vendor/autoload.php';


try {
    $data = (new CommandValidation($argv, $commands))->toArray();
    var_dump($data);die;
} catch(\Exception $e) {
    echo $e->getMessage();
}