<?php

namespace BladeElements;

use BladeElements\Console\Commands\AddCommand;
use BladeElements\Console\Commands\InitCommand;
use Illuminate\Support\ServiceProvider;

class BladeElementsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InitCommand::class,
                AddCommand::class,
            ]);
        }
    }
}
