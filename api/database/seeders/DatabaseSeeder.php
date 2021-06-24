<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AppLanguageSeeder::class,
            TimezoneSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            RoleSeeder::class,
            ActionSeeder::class,
            UserSeeder::class,
            ContactSeeder::class
        ]);
    }
}
