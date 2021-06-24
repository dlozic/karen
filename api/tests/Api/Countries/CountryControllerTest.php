<?php

namespace Tests\Api\Countries;


use Tests\ApiTest;

class CountryControllerTest extends ApiTest
{
    public function test_can_load_countries()
    {
        $this->authGet('countries')
            ->assertJsonFragment([
                'success' => true
            ]);
    }
}
