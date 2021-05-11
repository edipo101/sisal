<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_salidas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salida_id')->unsigned();
            $table->integer('detalle_ingreso_id')->unsigned();
            $table->double('cantidad_salida');
            $table->double('precio_salida');
            $table->double('subtotal');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('salida_id')->references('id')->on('salidas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('detalle_ingreso_id')->references('id')->on('detalle_ingresos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_salidas');
    }
}
