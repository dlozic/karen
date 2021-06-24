<?php

namespace Tests\Api\Auth;

use Modules\Core\Users\User;
use Tests\ApiTest;

class ChangePasswordTest extends ApiTest
{

    public function test_can_admin_change_others_password()
    {
        $payload = ['password' => 'password2'];
        $adminId = User::factory()->create()->id;
        $this->authPost("auth/change-password/{$adminId}", $payload)
            ->assertJsonFragment(['success' => true]);
    }
}
