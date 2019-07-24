<?php

namespace App\Validations;

class CommandValidation
{
    private $num;
    private $time;
    private $command;
    private $commands = [
                'fibonacci',
                'naturalNumer',
                'help',
                'result'
            ];

    public function __construct(array $argv)
    {
        $this->checkData($argv);
        $this->checkNameCommand($argv[0]);
        $this->num = (int) $argv[1];
        $this->checkNum();
        $this->time = (int) $argv[2];
    }

    public function toArray(): array
    {
        return ['command' => $this->command, 'num' => $this->num, 'time' => $this->time];
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
        if (array_search($nameCommand, $this->commands) === false) {
            throw new \Exception('Data is not transmitted correctly, use the command "help"');
        }

        $this->command = $nameCommand;
    }

    private function checkNum(): void
    {
        if ($this->num === 0) {
            throw new \Exception('Data is not transmitted correctly, use the command "help"');
        }
    }
}