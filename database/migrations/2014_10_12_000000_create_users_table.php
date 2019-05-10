<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 100)->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('blogTitle')->nullable();
            $table->string('blogDesc')->nullable();
            $table->string('blogHeaderImg')->nullable();
            $table->string('url');
            $table->boolean('status');
            $table->boolean('isAdmin');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
