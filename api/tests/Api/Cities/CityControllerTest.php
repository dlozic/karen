<?php

namespace Tests\Api\Cities;

use Tests\ApiTest;

class CityControllerTest extends ApiTest
{
    public function test_can_load_countries()
    {
        $this->authGet('cities')
            ->assertJsonFragment([
                'success' => true
            ]);
    }
}
