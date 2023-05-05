<?php

use Hyvor\LaravelE2E\Tests\Helpers\UserModel;

it('selects a user', function() {

    $user = UserModel::factory()->create();

    $this->postJson('/_testing/select', [
        'query' => 'select * from users where id = ' . $user->id
    ])
        ->assertOk()
        ->assertJsonPath('0.id', $user->id);

});