<?php

namespace RakkoInc\LaravelMaintenanceMode\Foundation\Exceptions;

class Handler extends \Illuminate\Foundation\Exceptions\Handler
{
    protected function registerErrorViewPaths()
    {
        (new RegisterErrorViewPaths)();
    }
}
