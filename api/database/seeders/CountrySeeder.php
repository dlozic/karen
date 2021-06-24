<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            ['name' => 'Croatia', 'native_name' => 'Hrvatska'],
            ['name' => 'Germany', 'native_name' => 'Deutschland']
        ];

        DB::table('app_countries')->insert($countries);
    }
}
