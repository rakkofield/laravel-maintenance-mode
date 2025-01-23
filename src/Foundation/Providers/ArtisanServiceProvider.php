<?php

namespace RakkoInc\LaravelMaintenanceMode\Foundation\Providers;

use RakkoInc\LaravelMaintenanceMode\Console\DownCommand;
use RakkoInc\LaravelMaintenanceMode\Console\UpCommand;

class ArtisanServiceProvider extends \Illuminate\Foundation\Providers\ArtisanServiceProvider
{
    protected function registerUpCommand()
    {
        $this->app->singleton('command.up', function () {
            return new UpCommand();
        });
    }

    protected function registerDownCommand()
    {
        $this->app->singleton('command.down', function () {
            return new DownCommand();
        });
    }
}
