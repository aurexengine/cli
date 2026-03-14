<?php

namespace AurexEngine\CLI\Console\Commands;

class MakeControllerCommand
{
    public function handle(array $args)
    {
        $name = $args[0] ?? null;

        if (!$name) {
            echo "Controller name required.\n";
            return;
        }

        $path = "app/Controllers/{$name}.php";

        if (file_exists($path)) {
            echo "Controller already exists.\n";
            return;
        }

        $template = <<<PHP
        <?php

        namespace App\Controllers;

        class {$name}
        {
            public function index()
            {
                return "Hello from {$name}";
            }
        }
        PHP;

        if (!is_dir('app/Controllers')) {
            mkdir('app/Controllers', 0777, true);
        }

        file_put_contents($path, $template);

        echo "Controller created: {$path}\n";
    }
}