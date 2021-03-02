<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAglutinanteSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aglutinante_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('aglutinante_muestra'); 
            $table->string('aglutinante_nomenclatura');
            $table->string('aglutinante_inf_requerida');
            $table->string('aglutinante_des_muestra');
            $table->string('aglutinante_ubicacion');
            $table->string('aglutinante_responsable');
            $table->string('aglutinante_identificacion_muestra');
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
        Schema::dropIfExists('aglutinante_solicitud');
    }
}
