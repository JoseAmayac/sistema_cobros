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
            // $table->integer('country_id')->unsigned();
            $table->unsignedBigInteger('country_id');
            // $table->integer('city_id')->unsigned();
            $table->unsignedBigInteger('city_id');

            // $table->integer('vehicle_id')->unsigned();
            $table->unsignedBigInteger('vehicle_id');

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
            //
        });
    }
}
