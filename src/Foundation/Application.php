<?php

namespace RakkoInc\LaravelMaintenanceMode\Foundation;

use RakkoInc\LaravelMaintenanceMode\Contracts\Foundation\MaintenanceMode;

class Application extends \Illuminate\Foundation\Application implements \RakkoInc\LaravelMaintenanceMode\Contracts\Foundation\Application
{

    public function maintenanceMode()
    {
        return $this->make(MaintenanceMode::class);
    }

    public function isDownForMaintenance()
    {
        return $this->maintenanceMode()->active();
    }

    public function registerCoreContainerAliases()
    {
        parent::registerCoreContainerAliases();

        $this->alias('app', \RakkoInc\LaravelMaintenanceMode\Contracts\Foundation\Application::class);
    }
}
