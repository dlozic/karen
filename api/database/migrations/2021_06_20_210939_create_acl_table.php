<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAclTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acl_actions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        Schema::create('acl_permissions', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('acl_roles');
            $table->foreignId('action_id')->constrained('acl_actions');
            $table->boolean('is_allowed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acl_permissions');
        Schema::dropIfExists('acl_actions');
    }
}
