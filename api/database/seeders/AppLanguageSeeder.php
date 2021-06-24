<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_languages')->insert([
            ['name' => 'Croatian', 'short_name' => 'hr', 'native_name' => 'Hrvatski'],
            ['name' => 'English', 'short_name' => 'en', 'native_name' => 'English']
            // ['name' => 'German', 'short_name' => 'de', 'native_name' => 'Deutsch']
        ]);
    }
}
