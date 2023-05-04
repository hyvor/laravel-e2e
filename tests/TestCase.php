<?php

namespace Tests;

use Hyvor\LaravelE2E\ServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

}
