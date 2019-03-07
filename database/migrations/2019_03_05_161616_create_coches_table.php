<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCochesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('modelo');
            $table->string('color');
            $table->string('fuel');
            $table->date('fech_mat');
            $table->string('matricula', 8)->unique();
            $table->bigInteger('marcas_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('marcas_id')->references('id')->on('marcas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coches');
    }
}
