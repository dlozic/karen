<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('native_name')->unique();
        });

        $countries = [
            ['name' => 'Croatia', 'native_name' => 'Hrvatska'],
            ['name' => 'Germany', 'native_name' => 'Deutschland']
        ];

        DB::table('app_countries')->insert($countries);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_countries');
    }
}
