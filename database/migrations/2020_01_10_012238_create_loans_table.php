<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('ammount');
            $table->integer('fees');
            $table->timestamps();

            // Llaves foraneas.
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
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
        Schema::dropIfExists('loans');
    }
}
