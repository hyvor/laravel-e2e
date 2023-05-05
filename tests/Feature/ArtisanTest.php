<?php

it('runs a artisan command', function() {

    $json = $this->post('_testing/artisan', [
        'command' => 'route:list'
    ])
        ->assertOk()
        ->json();

    expect($json['code'])->toBe(0);
    expect($json['output'])->toContain('_testing/artisan');

});