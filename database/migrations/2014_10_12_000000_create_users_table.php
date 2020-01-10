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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('dni');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('cellphone');
            $table->string('address');
            $table->string('second_address');
            $table->enum('reputation', [1, 2, 3, 4, 5]);
            $table->string('password');
            $table->boolean('state');
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
