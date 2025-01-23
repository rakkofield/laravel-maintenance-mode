<?php

namespace RakkoInc\LaravelMaintenanceMode\Foundation\Providers;

use RakkoInc\LaravelMaintenanceMode\Contracts\Foundation\MaintenanceMode;
use RakkoInc\LaravelMaintenanceMode\Foundation\FileBasedMaintenanceMode;

class FoundationServiceProvider extends \Illuminate\Foundation\Providers\FoundationServiceProvider
{
    public function register()
    {
        parent::register();

        $this->registerMaintenanceModeManager();
    }

    /**
     * Register the maintenance mode manager service.
     *
     * @return void
     */
    public function registerMaintenanceModeManager()
    {
        $this->app->bind(MaintenanceMode::class, FileBasedMaintenanceMode::class);
    }
}
