<?php

namespace Hyvor\LaravelE2E\Tests\Helpers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrations
{

    public static function run(): void
    {

        DB::statement('DROP TABLE IF EXISTS users');

        DB::statement('
            CREATE TABLE users (
                id INTEGER PRIMARY KEY AUTO_INCREMENT,
                name varchar(255) DEFAULT NULL,
                created_at timestamp NULL DEFAULT NULL,
                updated_at timestamp NULL DEFAULT NULL
            )
        ');

    }

}