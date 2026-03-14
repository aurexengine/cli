<?php

namespace AurexEngine\CLI\Console\Commands;

class ServeCommand
{
    public function handle(array $args)
    {
        echo "Starting AurexEngine dev server...\n";
        passthru("php -S localhost:8000 -t public");
    }
}