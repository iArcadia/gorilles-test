<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the "users" table.
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('first_name');
            $table->date('birthday');
            $table->string('email')->unique();
            
            // "created_at", "updated_at" and "deleted_at"
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
