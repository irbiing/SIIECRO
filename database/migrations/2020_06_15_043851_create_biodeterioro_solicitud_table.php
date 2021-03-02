<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiodeterioroSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodeterioro_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('biodeterioro_muestra'); 
            $table->string('biodeterioro_nomenclatura');
            $table->string('biodeterioro_inf_requerida');
            $table->string('biodeterioro_des_muestra');
            $table->string('biodeterioro_ubicacion');
            $table->string('biodeterioro_responsable');
            $table->string('biodeterioro_identificacion_muestra');
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
        Schema::dropIfExists('biodeterioro_solicitud');
    }
}
