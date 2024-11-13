<?php

namespace RakkoInc\LaravelMaintenanceMode\Integration;

use Orchestra\Testbench\Foundation\PackageManifest;
use RakkoInc\LaravelMaintenanceMode\Foundation\Application;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function resolveApplication()
    {
        return \tap(new Application($this->getBasePath()), function ($app) {
            $app->bind(
                'Illuminate\Foundation\Bootstrap\LoadConfiguration',
                'Orchestra\Testbench\Bootstrap\LoadConfiguration'
            );

            PackageManifest::swap($app, $this);
        });
    }

    protected function overrideApplicationProviders($app)
    {
        return [
            'Illuminate\Foundation\Providers\FoundationServiceProvider' => 'RakkoInc\LaravelMaintenanceMode\Foundation\Providers\FoundationServiceProvider',
            'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider' => 'RakkoInc\LaravelMaintenanceMode\Foundation\Providers\ConsoleSupportServiceProvider',
        ];
    }
}
