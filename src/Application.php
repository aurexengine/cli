<?php

namespace AurexEngine\CLI;

use AurexEngine\CLI\Console\Kernel;

class Application
{
    protected Kernel $kernel;

    public function __construct()
    {
        $this->kernel = new Kernel();
    }

    public function run(array $argv)
    {
        $command = $argv[1] ?? 'list';
        $args = array_slice($argv, 2);

        $this->kernel->handle($command, $args);
    }
}