<?php

namespace Hyvor\LaravelE2E\Tests\Helpers;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{

    protected $model = UserModel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }

}