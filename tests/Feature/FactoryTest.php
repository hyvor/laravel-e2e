<?php

use Hyvor\LaravelE2E\Tests\Helpers\UserModel;

it('creates a model factory', function() {

    $this->postJson('_testing/factory', [
        'model' => '\Hyvor\LaravelE2E\Tests\Helpers\UserModel',
        'attrs' => [
            'name' => 'John Doe',
        ]
    ])
        ->assertOk()
        ->assertJsonPath('name', 'John Doe');

    expect(UserModel::count())->toBe(1);

});

it('creates models with count', function() {

    $this->postJson('_testing/factory', [
        'model' => '\Hyvor\LaravelE2E\Tests\Helpers\UserModel',
        'count' => 3
    ])
        ->assertOk()
        ->assertJsonCount(3);

    expect(UserModel::count())->toBe(3);

});