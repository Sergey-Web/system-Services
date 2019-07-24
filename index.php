<?php

declare(strict_types=1);

use App\Controllers\Contorller;
use App\Validations\CommandValidation;

require_once __DIR__ . '/vendor/autoload.php';

 $commands = [
    'fibonacci',
    'naturalNumer',
    'help'
];

try {
    (new CommandValidation($argv, $commands))->check();
} catch(\Exception $e) {
    echo $e->getMessage();
}

} $argv[0])
switch($argv[0]) {
    case 'fibonacci':
        (new Contorller())->setFibonacci();
        break;
    case 'naturalNumer':
        (new Contorller())->setNaturalNumber();
        break;
    case 'help':
        break;
}