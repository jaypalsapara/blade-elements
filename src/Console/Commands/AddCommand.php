<?php

namespace BladeElements\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

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

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $component = $this->argument('component');

        $registry = json_decode(file_get_contents(dirname(__DIR__, 3).'/registry.json'), true);

        // Add all components
        if ($component === 'all' && ! empty($registry)) {
            $components = array_keys($registry);
            foreach ($components as $component) {
                $config = $registry[$component];

                // $this->installDependencies($config);

                $this->installComponent($component, $config);
            }
        } else {
            // Add specific component
            $config = $registry[$component] ?? null;

            if (! $config) {
                $this->line("<fg=red>✗</> Component [{$component}] not found");

                return 1;
            }

            // $this->installDependencies($config);

            $this->installComponent($component, $config);
        }
    }

    /**
     * Install component
     */
    protected function installComponent(string $component, array $config)
    {
        $destination = $this->config('destination');

        foreach ($config['files'] as $file) {
            $source = $this->config('source').'/'.$file;
            $info = "<fg=green>✓</> [{$component}] component has been added!";

            if (str_contains($file, 'components')) {
                $destination = $this->config('destination')['ui'].'/'.basename($file);
            } elseif (str_contains($file, 'classes/')) {
                $destination = $this->config('destination')['classes'].'/'.basename($file);
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

            $this->line($info);
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
                'classes' => app_path('View/Components'),
            ] ,
        };
    }
}
