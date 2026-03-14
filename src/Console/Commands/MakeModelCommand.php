<?php

namespace AurexEngine\CLI\Console\Commands;

class MakeModelCommand
{
    public function handle(array $args)
    {
        $name = $args[0] ?? null;

        if (!$name) {
            echo "Model name required.\n";
            return;
        }

        $path = "app/Models/{$name}.php";

        if (file_exists($path)) {
            echo "Model already exists.\n";
            return;
        }

        $template = <<<PHP
        <?php

        namespace App\Models;

        class {$name}
        {
            protected string \$table = "{$name}";
        }
        PHP;

        if (!is_dir('app/Models')) {
            mkdir('app/Models', 0777, true);
        }

        file_put_contents($path, $template);

        echo "Model created: {$path}\n";
    }
}