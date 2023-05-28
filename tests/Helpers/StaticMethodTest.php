<?php

namespace Hyvor\LaravelE2E\Tests\Helpers;

class StaticMethodTest
{

    public static function ping() : string
    {
        return 'pong';
    }

}