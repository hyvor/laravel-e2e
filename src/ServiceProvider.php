<?php declare(strict_types=1);

namespace Hyvor\LaravelE2E;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    public function boot() : void
    {

        if (App::environment('local', 'testing')) {
            $this->loadRoutesFrom(__DIR__ . '/routes/e2e.php');
        }

    }

}