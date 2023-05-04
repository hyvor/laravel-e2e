<?php

namespace Hyvor\LaravelE2E;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    public function boot() : void
    {

        $this->loadRoutesFrom(__DIR__ . '/routes/e2e.php');

    }

}