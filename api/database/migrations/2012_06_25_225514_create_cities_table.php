<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('country_id')->constrained('app_countries');
        });

        $cities = [
            ['name' => 'Zagreb', 'country_id' => 1],
            ['name' => 'Rijeka', 'country_id' => 1],
            ['name' => 'Frankfurt', 'country_id' => 2]
        ];

        DB::table('app_cities')->insert($cities);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_cities');
    }
}
