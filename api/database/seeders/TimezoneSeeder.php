<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Timezones\Timezone;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timezones = collect([
            'Europe/Zagreb',
            'Europe/Andorra',
            'Europe/Astrakhan',
            'Europe/Athens',
            'Europe/Belgrade',
            'Europe/Berlin',
            'Europe/Bratislava',
            'Europe/Brussels',
            'Europe/Bucharest',
            'Europe/Budapest',
            'Europe/Busingen',
            'Europe/Chisinau',
            'Europe/Copenhagen',
            'Europe/Dublin',
            'Europe/Gibraltar'
        ]);

        $timezones->each(function($name) {
            Timezone::create(compact('name'));
        });
    }
}
