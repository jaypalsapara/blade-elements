<?php

namespace BladeElements\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AddCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ui:add {component}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a UI component to your application';

    protected $registry;

    public function __construct()
    {
        $this->registry = json_decode(file_get_contents(dirname(__DIR__, 3).'/registry.json'), true);

        return parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $component = $this->argument('component');

        $registry = $this->registry;

        // Add all components
        if ($component === 'all' && ! empty($registry)) {
            $components = array_keys($registry);
            foreach ($components as $component) {
                $config = $registry[$component];

                $this->installDependencies($config);

                $this->installComponent($component, $config);
            }
        } else {
            // Add specific component
            $config = $registry[$component] ?? null;

            if (! $config) {
                $this->line("<fg=red>✗</> Component [{$component}] not found");

                return 1;
            }

            $this->installDependencies($config);

            $this->installComponent($component, $config);
        }
    }

    /**
     * Install component
     */
    protected function installComponent(string $component, array $config)
    {
        $destination = $this->config('destination');

        $info = "<fg=green>✓</> [{$component}] component has been added!";

        foreach ($config['files'] as $file) {
            $source = $this->config('source').'/'.$file;

            if (str_starts_with($file, 'components/')) {
                $destination = $this->config('destination')['ui'].'/'. Str::after($file, 'components/');
            } elseif (str_starts_with($file, 'classes/')) {
                $destination = $this->config('destination')['classes'].'/'. Str::after($file, 'classes/');
            }

            // Create directory if not exists
            if (! file_exists(dirname($destination))) {
                mkdir(dirname($destination), 0755, true);
            }

            // Ask for override if exists
            if (file_exists($destination)) {
                $confirm = $this->ask("Component [{$component}] already exists. Overwrite it? (yes/no) [no]");
                if (! (strtolower($confirm) === 'y' || strtolower($confirm) === 'yes')) {

                    $this->line("<fg=cyan>-</> [{$component}] component was skipped.");

                    continue;
                }
                $info = "<fg=green>✓</> [{$component}] component has been overridden!";

            }

            $client = new Client;
            $result = $client->get($source, ['headers' => ['Accept' => 'text/plain']]);
            $content = $result->getBody()->getContents();

            file_put_contents($destination, $content);

        }
        $this->line($info);
    }

    /**
     * Install component dependencies
     */
    protected function installDependencies(array $config)
    {

        $registry = $this->registry;
        $registryDependencies = $config['registryDependencies'] ?? [];

        if (empty($registryDependencies)) {
            return;
        }

        $this->line('Installing dependencies...');

        foreach ($registryDependencies as $dependency) {
            $dependencyConfig = $registry[$dependency] ?? null;

            if (! $dependencyConfig) {
                $this->line("<fg=red>✗</>Dependency component [{$dependency}] not found");

                continue;
            }

            $this->installDependencies($dependencyConfig);

            $this->installComponent($dependency, $dependencyConfig);
        }
    }

    /**
     * Configs
     */
    protected function config(string $key)
    {
        return match ($key) {
            'source' => 'https://raw.githubusercontent.com/jaypalsapara/blade-elements/main/resources/views',
            'destination' => [
                'ui' => resource_path('views/components/ui'),
                'classes' => app_path('View/Components/Ui'),
            ] ,
        };
    }
}
