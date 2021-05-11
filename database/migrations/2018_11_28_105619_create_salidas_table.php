<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('destino_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('funcionario_id')->unsigned();
            $table->integer('almacen_id')->unsigned();
            // $table->integer('mecanico_id')->unsigned();
            // $table->integer('conductor_id')->unsigned();
            $table->double('cantidad');
            $table->double('total');
            $table->mediumText('observacion');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('almacen_id')->references('id')->on('almacens')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('mecanico_id')->references('id')->on('mecanicos')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('conductor_id')->references('id')->on('conductors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas');
    }
}
