<?php

use Illuminate\Config\Repository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Hyvor\LaravelE2E\Controller;

if (App::environment('local', 'testing')) {

    /** @var Repository  $config */
    $config = config();
    $prefix = $config->get('app.e2e.prefix', '_testing');

    Route::prefix($prefix)->group(function () {

        Route::post('artisan', [Controller::class, 'artisan']);
        Route::post('truncate', [Controller::class, 'truncate']);
        Route::post('factory', [Controller::class, 'factory']);
        Route::post('query', [Controller::class, 'query']);
        Route::post('select', [Controller::class, 'select']);
        Route::post('function', [Controller::class, 'function']);

    });

}
