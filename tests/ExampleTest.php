<?php

namespace Rabol\LaravelSetupLocalDev\Tests;

use Orchestra\Testbench\TestCase;
use Rabol\LaravelSetupLocalDev\LaravelSetupLocalDevServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelSetupLocalDevServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
