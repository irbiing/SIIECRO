<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialAgregadoSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_agregado_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('materialag_muestra'); 
            $table->string('materialag_nomenclatura');
            $table->string('materialag_inf_requerida');
            $table->string('materialag_des_muestra');
            $table->string('materialag_ubicacion');
            $table->string('materialag_responsable');
            $table->string('materialag_identificacion_muestra');
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
        Schema::dropIfExists('material_agregado_solicitud');
    }
}
