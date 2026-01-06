<?php

namespace BladeElements\Console\Commands;

use Illuminate\Console\Command;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ui:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize UI components in your application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->info('Initializing UI components...');
    }
}
