<?php

namespace App\Validations\IValidation;

class CommandValidation implements IValidation
{
    private $num;

    private $time;

    public function __construct(array $argv, array $commands)
    {
        $this->checkData($argv);
        $this->checkNameCommand($argv[0]);

        $this->num = (int) $argv[1];
        $this->time = (int) $argv[2];
    }

    public function checkCalculationNumber(): void
    {
        if ($this->num === 0) {
            throw new \Exception('Data is not transmitted correctly, use the command "help"');
        }
    }

    private function checkData(array $argv): void 
    {
        if (count($argv) !== 3) {
            throw new \Exception('Data is not transmitted correctly, use the command "help"');
        }
    }

    private function checkNameCommand(string $nameCommand): void
    {
        if (array_search($argv[0], $this->commands) === false) {
            throw new \Exception('Data is not transmitted correctly, use the command "help"');
        }
    }
}