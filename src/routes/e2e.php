<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Hyvor\LaravelE2E\Controller;

if (App::environment('local', 'testing')) {

    Route::prefix('_testing')->group(function () {

        Route::post('artisan', [Controller::class, 'artisan']);
        Route::post('truncate', [Controller::class, 'truncate']);
        Route::post('factory', [Controller::class, 'factory']);
        Route::post('query', [Controller::class, 'query']);
        Route::post('select', [Controller::class, 'select']);
        Route::post('function', [Controller::class, 'function']);

    });

}