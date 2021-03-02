<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePigmentosSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pigmentos_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('pigmentos_muestra'); 
            $table->string('pigmentos_nomenclatura');
            $table->string('pigmentos_inf_requerida');
            $table->string('pigmentos_des_muestra');
            $table->string('pigmentos_ubicacion');
            $table->string('pigmentos_responsable');
            $table->string('pigmentos_identificacion_muestra');
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
        Schema::dropIfExists('pigmentos_solicitud');
    }
}
