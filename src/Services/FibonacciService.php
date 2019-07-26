<?php

declare(strict_types=1);

namespace App\Service;

class FibonacciService 
{
    private function connectChannels()
    {
        try {
            $this->checkConnectChannel();
        } catch (\Exception $e) {

        }
    }

    public function checkConnectChannel()
    {
        
    }
    
    public function connectChannels()
    {
        try {
            $this->checkConnectChannel()
        } catch (\Exception $e) {
            $redisCli = $this->redisCli;
            $pubsub = $redisCli->pubSubLoop();
            $pubsub->subscribe('control_channel', 'notifications');
            foreach ($pubsub as $message) {
                switch ($message->kind) {
                    case 'subscribe':
                        echo "Subscribed to {$message->channel}", PHP_EOL;
                        break;
                    case 'message':
                        if ($message->channel == 'control_channel') {
                            if ($message->payload == 'quit_loop') {
                                echo 'Aborting pubsub loop...', PHP_EOL;
                                $pubsub->unsubscribe();
                            } else {
                                echo "Received an unrecognized command: {$message->payload}.", PHP_EOL;
                            }
                        } else {
                            echo "Received the following message from {$message->channel}:",
                                 PHP_EOL, "  {$message->payload}", PHP_EOL, PHP_EOL;
                        }
                        break;
                }
            }
    
            unset($pubsub);
            // Say goodbye :-)
            $version = redis_version($client->info());
            echo "Goodbye from Redis $version!", PHP_EOL;
            
            return $subscribe;
        }
    }
}