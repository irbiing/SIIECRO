<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecubrimientoSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recubrimiento_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('recubrimiento_muestra'); 
            $table->string('recubrimiento_nomenclatura');
            $table->string('recubrimiento_inf_requerida');
            $table->string('recubrimiento_des_muestra');
            $table->string('recubrimiento_ubicacion');
            $table->string('recubrimiento_responsable');
            $table->string('recubrimiento_identificacion_muestra');
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
        Schema::dropIfExists('recubrimiento_solicitud');
    }
}
