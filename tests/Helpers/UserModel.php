<?php

namespace Hyvor\LaravelE2E\Tests\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{

    use HasFactory;

    protected $table = 'users';

    protected static function newFactory()
    {
        return UserFactory::new();
    }

}