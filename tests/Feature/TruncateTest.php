<?php

use Hyvor\LaravelE2E\Tests\Helpers\UserModel;

it('truncates', function() {

    UserModel::factory()->count(3)->create();
    expect(UserModel::count())->toBe(3);

    $this->post('_testing/truncate')->assertOk();

    expect(UserModel::count())->toBe(0);

});