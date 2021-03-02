<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtrosSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otros_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('otros_muestra'); 
            $table->string('otros_nomenclatura');
            $table->string('otros_inf_requerida');
            $table->string('otros_des_muestra');
            $table->string('otros_ubicacion');
            $table->string('otros_responsable');
            $table->string('otros_identificacion_muestra');
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
        Schema::dropIfExists('otros_solicitud');
    }
}
