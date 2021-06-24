<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = [
            ['name' => 'Zagreb', 'country_id' => 1],
            ['name' => 'Rijeka', 'country_id' => 1],
            ['name' => 'Frankfurt', 'country_id' => 2]
        ];

        DB::table('app_cities')->insert($cities);
    }
}
