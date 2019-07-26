<?php

declare(strict_types=1);

namespace App\Controllers;

use Predis\Client;

class Controller
{
    private $redisCli;

    private $channel;

    public function actionFibonacci(int $num, int $time)
    {

    }
}