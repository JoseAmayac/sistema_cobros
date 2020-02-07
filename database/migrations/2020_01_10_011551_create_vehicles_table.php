<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('license_plate');
            $table->string('mark');
            $table->integer('model');
            $table->integer('cylindering');
            $table->date('papers_due_date');
            $table->timestamps();
            $table->softDeletes();

            //Llaves foraneas
            $table->unsignedBigInteger('admin_id');

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
        Schema::dropIfExists('vehicles');
    }
}
