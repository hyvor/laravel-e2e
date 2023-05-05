<?php

use Hyvor\LaravelE2E\ServiceProvider;
use Illuminate\Routing\RouteCollection;
use Illuminate\Support\Facades\Route;

it('does not add routes for production', function() {

    $this->post('_testing/truncate')->assertOk();

    $this->app->detectEnvironment(fn() => 'production');
    $this->app->register(ServiceProvider::class, true);

    $this->app['env'] = 'production';
    Route::setRoutes(new RouteCollection());
    (new ServiceProvider($this->app))->boot();

    $this->post('_testing/artisan')->assertNotFound();

});