<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('country_id')->nullable();

            $table->unsignedBigInteger('city_id')->nullable();

            $table->unsignedBigInteger('vehicle_id')->nullable();

            $table->unsignedBigInteger('role_id')->after('id');

            // Recursiva, para modelar clientes del administrador.
            $table->unsignedBigInteger('admin_id')
                                    ->after('role_id')->nullable();

            $table->foreign('country_id')
                    ->references('id')->on('countries')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            
            $table->foreign('city_id')
                    ->references('id')->on('cities')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('vehicle_id')
                    ->references('id')->on('vehicles')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            
            $table->foreign('role_id')
                    ->references('id')->on('roles')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('admin_id')
                    ->references('id')->on('users')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //Schema::dropIfExists('users');
        });
    }
}
