<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_files', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');
            $table->string('disk_name')->unique();
            $table->string('mime_type');
            $table->unsignedBigInteger('file_size');

            /* file can belong to any other entity */
            $table->string('fileable_type');
            $table->unsignedBigInteger('fileable_id');

            /* uploaded by */
            $table->foreignId('uploaded_by_id')->constrained('app_users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_files');
    }
}
