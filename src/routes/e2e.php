<?php

use Illuminate\Support\Facades\Route;
use Hyvor\LaravelE2E\Controller;

Route::prefix('_testing')->group(function() {

    Route::post('truncate', [Controller::class, 'truncate']);
    Route::post('factory', [Controller::class, 'factory']);
    Route::post('query', [Controller::class, 'query']);

});