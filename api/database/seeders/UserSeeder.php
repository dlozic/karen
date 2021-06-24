<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Users\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        /* admin */
        User::factory(['email' => 'admin@admin.com'])
            ->admin()
            ->create();
    }
}
