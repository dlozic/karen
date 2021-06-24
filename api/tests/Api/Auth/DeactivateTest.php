<?php

namespace Tests\Api\Auth;

use Illuminate\Support\Str;
use Modules\Core\Users\User;
use Tests\ApiTest;

class DeactivateTest extends ApiTest
{
    public function test_can_admin_deactivate_user()
    {
        $credentials = [
            'email' => Str::random(rand(5, 15)) . '@gmail.com',
            'password' => 'password',
            'role_id' => 1
        ];

        $admin = User::factory()->create($credentials);

        $this->authPost('auth/toggle-activation/' . $admin->id)
            ->assertJsonFragment(['success' => true]);
    }

    public function test_fail_self_deactivation()
    {
        $this->authPost('auth/toggle-activation/1')
            ->assertJsonFragment(['success' => false]);
    }
}
