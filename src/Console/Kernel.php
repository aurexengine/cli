<?php

namespace AurexEngine\CLI\Console;

use AurexEngine\CLI\Console\Commands\ServeCommand;
use AurexEngine\CLI\Console\Commands\MakeControllerCommand;
use AurexEngine\CLI\Console\Commands\MakeModelCommand;

class Kernel
{
    protected array $commands = [];

    public function __construct()
    {
        $this->commands = [
            'serve' => ServeCommand::class,
            'make:controller' => MakeControllerCommand::class,
            'make:model' => MakeModelCommand::class,
        ];
    }

    public function handle(string $command, array $args)
    {
        if (!isset($this->commands[$command])) {
            echo "Command not found: {$command}\n";
            return;
        }

        $class = $this->commands[$command];
        $instance = new $class();

        $instance->handle($args);
    }
}