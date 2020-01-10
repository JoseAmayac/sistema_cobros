<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('ammount');
            $table->text('description')->nullable();            
            $table->timestamps();

            // Llaves foraneas.
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('loan_id');

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('loan_id')
                    ->references('id')->on('loans')
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
        Schema::dropIfExists('loan_user');
    }
}
