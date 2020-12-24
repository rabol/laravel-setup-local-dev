<?php

namespace Rabol\LaravelSetupLocalDev;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rabol\LaravelSetupLocalDev\Skeleton\SkeletonClass
 */
class LaravelSetupLocalDevFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-setup-local-dev';
    }
}
