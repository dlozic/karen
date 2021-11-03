<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Contacts\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        $ownerId = rand(1, 10);
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'created_by_id' => $ownerId,
            'owner_id' => $ownerId
        ];
    }
}
