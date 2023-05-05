<?php

use Hyvor\LaravelE2E\Tests\Helpers\UserModel;

it('runs a query', function() {

    $users = UserModel::factory()
        ->count(3)
        ->create();

    $this->postJson('/_testing/query', [
        'query' => 'update users set name = "John Doe" where id = ' . $users[0]->id
    ])->assertOk();

    expect($users[0]->refresh()->name)->toBe('John Doe');

});