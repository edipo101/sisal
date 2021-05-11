<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('nro_sigma');
            $table->string('nombre');
            $table->mediumText('descripcion');
            $table->string('imagen')->default('default.jpg');
            $table->integer('categoria_id')->unsigned();
            $table->integer('umedida_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('umedida_id')->references('id')->on('umedidas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
