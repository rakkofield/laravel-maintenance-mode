<?php

namespace RakkoInc\LaravelMaintenanceMode\Contracts\Foundation;

interface Application extends \Illuminate\Contracts\Foundation\Application
{
    /**
     * Get an instance of the maintenance mode manager implementation.
     *
     * @return MaintenanceMode
     */
    public function maintenanceMode();
}
