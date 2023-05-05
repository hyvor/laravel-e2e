<?php

namespace Hyvor\LaravelE2E\Tests;

use Hyvor\LaravelE2E\ServiceProvider;
use Hyvor\LaravelE2E\Tests\Helpers\Migrations;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        Migrations::run();
    }

    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

}
