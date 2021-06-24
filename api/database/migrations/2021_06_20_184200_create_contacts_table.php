<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->foreignId('created_by_id')->constrained('app_users');
            $table->foreignId('owner_id')->constrained('app_users');
            $table->timestamps();
        });

        Schema::create('contact_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
        });

        Schema::create('contact_memberships', function (Blueprint $table) {
            $table->primary(['contact_id', 'group_id']);
            $table->foreignId('contact_id')->constrained();
            $table->foreignId('group_id')->constrained('contact_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_memberships');
        Schema::dropIfExists('contact_groups');
        Schema::dropIfExists('contacts');
    }
}
