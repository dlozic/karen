<?php

namespace Tests\Api\Auth;

use Illuminate\Support\Str;
use Modules\Core\Users\User;
use Tests\ApiTest;

class LoginTest extends ApiTest
{
    public function test_can_admin_login()
    {
        $credentials = [
            'email' => Str::random(rand(5, 15)) . '@gmail.com',
            'password' => 'password',
            'role_id' => 1
        ];

        User::factory()
            ->create($credentials);

        $this->postJson('api/auth/login', $credentials)
            ->assertJsonFragment(['success' => true]);
    }

    public function test_invalid_credentials_login()
    {
        $credentials = [
            'email' => Str::random(rand(5, 15)) . '@gmail.com',
            'password' => 'aabbccdd'
        ];

        $this->postJson('api/auth/login', $credentials)
            ->assertJsonFragment([
                'success' => false,
                'error_code' => 'auth.invalid_credentials'
            ]);
    }
}
