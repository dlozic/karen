<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Contacts\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        if(env('APP_ENV') !== 'production') {
            Contact::factory()
                ->times(10)
                ->create();
        }
    }
}
