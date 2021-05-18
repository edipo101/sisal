<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->increments('id');
            // $table->enum('tipo', ['I', 'S'])->default('null');
            $table->integer('ingreso_id')->unsigned()->nullabled();
            $table->integer('salida_id')->unsigned()->nullabled();
            $table->integer('producto_id')->unsigned();
            $table->double('cantidad');
            $table->double('precio');
            $table->double('subtotal');
            $table->integer('stock_final');
            $table->double('saldo');

            $table->timestamps();
            $table->foreign('ingreso_id')->references('id')->on('ingresos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('salida_id')->references('id')->on('salidas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
}
