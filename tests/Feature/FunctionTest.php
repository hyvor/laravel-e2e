<?php

if (!function_exists('testFunction1')) {
    function testFunction1() {
        return 'Hello';
    }
}

if (!function_exists('testFunction2')) {
    function testFunction2(string $name) {
        return 'Hello ' . $name;
    }
}

if (!function_exists('testFunction3')) {
    function testFunction3(string $name, int $age) {
        return 'Hello ' . $name . '. You are ' . $age;
    }
}

if (!class_exists('testStaticMethodClass1')) {

    class testStaticMethodClass1 {
        static function sayHello($name) {
            return "Says Hello to " . $name;
        }
    }

}

it('calls a function', function() {

    $this->postJson('/_testing/function', [
        'function' => 'testFunction1'
    ])
        ->assertOk()
        ->assertSee('Hello');

});

it('calls a function with args', function() {

    $this->postJson('/_testing/function', [
        'function' => 'testFunction2',
        'args' => ['Supun']
    ])
        ->assertOk()
        ->assertSee('Hello Supun');

});

it('calls a function with named args', function() {

    $this->postJson('/_testing/function', [
        'function' => 'testFunction3',
        'args' => [
            'age' => 20,
            'name' => 'Supun'
        ]
    ])
        ->assertOk()
        ->assertSee('Hello Supun. You are 20');

});

it('calls a static method', function() {

    $this->postJson('/_testing/function', [
        'function' => 'testStaticMethodClass1::sayHello',
        'args' => ['me']
    ])
        ->assertOk()
        ->assertSee('Says Hello to me');

});


it('calls a static method with namespace', function() {

    $this->postJson('/_testing/function', [
        'function' => 'Hyvor\LaravelE2E\Tests\Helpers\StaticMethodTest::ping',
    ])
        ->assertOk()
        ->assertSee('pong');

});