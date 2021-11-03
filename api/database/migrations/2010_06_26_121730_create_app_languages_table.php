<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAppLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('native_name')->unique();
            $table->string('short_name')->unique();
        });

        /* seed */
        DB::table('app_languages')->insert([
            ['name' => 'Croatian', 'short_name' => 'hr', 'native_name' => 'Hrvatski'],
            ['name' => 'English', 'short_name' => 'en', 'native_name' => 'English'],
            ['name' => 'German', 'short_name' => 'de', 'native_name' => 'Deutsch']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_languages');
    }
}
