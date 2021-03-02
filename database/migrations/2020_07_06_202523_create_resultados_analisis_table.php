<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosAnalisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados_analisis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_registro');
            $table->string('resultado_interpretacion'); 
            $table->string('resultado_descripcion');
            $table->string('resultado_imagenes')->default('Sin imagen');             //SON IMAGENES.
            $table->string('resultado_datos')->default('Sin imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados_analisis');
    }
}
