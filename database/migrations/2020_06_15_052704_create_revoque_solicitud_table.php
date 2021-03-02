<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevoqueSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revoque_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('revoque_muestra'); 
            $table->string('revoque_nomenclatura');
            $table->string('revoque_inf_requerida');
            $table->string('revoque_des_muestra');
            $table->string('revoque_ubicacion');
            $table->string('revoque_responsable');
            $table->string('revoque_identificacion_muestra');
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
        Schema::dropIfExists('revoque_solicitud');
    }
}
