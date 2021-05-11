<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proveedor_id')->unsigned();
            $table->integer('almacen_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('destino_id')->unsigned();
            $table->string('orden');
            $table->string('preventivo');
            $table->double('cantidad');
            $table->double('total');
            $table->mediumText('observacion');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('almacen_id')->references('id')->on('almacens')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
