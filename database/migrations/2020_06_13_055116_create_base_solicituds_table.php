<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_solicituds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('base_muestra'); 
            $table->string('base_nomenclatura');
            $table->string('base_inf_requerida');
            $table->string('base_des_muestra');
            $table->string('base_ubicacion');
            $table->string('base_responsable');
            $table->string('base_identificacion_muestra');
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
        Schema::dropIfExists('base_solicituds');
    }
}
