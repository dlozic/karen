<?php

namespace Database\Factories;

use Modules\Core\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => rand(1, 10000) . $this->faker->safeEmail,
            'password' => env('SEED_USER_PASSWORD', 'password'),
            'is_active' => true,
            'role_id' => 1,
            'timezone_id' => 1,
            'language_id' => 1
        ];
    }

    public function inactive()
    {
        return $this->state(fn() => ['is_active' => false]);
    }

    public function admin()
    {
        return $this->state(fn() => ['role_id' => 1]);
    }

    public function user()
    {
        return $this->state(fn() => ['role_id' => 2]);
    }
}
