<?php

namespace RakkoInc\LaravelMaintenanceMode\Foundation\Providers;

use RakkoInc\LaravelMaintenanceMode\Contracts\Foundation\MaintenanceMode as MaintenanceModeContract;
use RakkoInc\LaravelMaintenanceMode\Foundation\MaintenanceModeManager;

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
        $this->app->singleton(MaintenanceModeManager::class);

        $this->app->bind(
            MaintenanceModeContract::class,
            function () {
                return $this->app->make(MaintenanceModeManager::class)->driver();
            }
        );
    }
}
