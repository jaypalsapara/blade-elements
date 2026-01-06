<?php

namespace BladeElements\Console\Commands;

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
        $registry = json_decode(file_get_contents(__DIR__.'/../../registry.json'), true);
        dd($registry);
    }
}
