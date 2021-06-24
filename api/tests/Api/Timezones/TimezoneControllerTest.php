<?php

namespace Tests\Api\Timezones;

use Tests\ApiTest;

class TimezoneControllerTest extends ApiTest
{
    public function test_can_admin_load_timezones()
    {
        $this->authGet('timezones')
            ->assertJsonFragment(['success' => true]);
    }
}
