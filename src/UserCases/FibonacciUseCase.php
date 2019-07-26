<?php

declare(strict_types=1);

namespace App\UserCases;

class FibonacciUseCase
{
    public function __construct(string $channel)
    {
        $this->channel = $channel;
        $this->redisCli = new Client('tcp://127.0.0.1:6379'."?read_write_timeout=-1");
        $this->connectChannels();
    }

    public function sendMessageChannel()
    {
        
    }

    private function checkConnectChannel()
    {

    }
}