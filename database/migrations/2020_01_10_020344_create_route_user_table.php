<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            // Llaves foraneas.
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('route_id');

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('route_id')
                    ->references('id')->on('routes')
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
        Schema::dropIfExists('route_user');
    }
}
