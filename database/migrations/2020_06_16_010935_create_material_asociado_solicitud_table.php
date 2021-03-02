<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialAsociadoSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_asociado_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('materialaso_muestra'); 
            $table->string('materialaso_nomenclatura');
            $table->string('materialaso_inf_requerida');
            $table->string('materialaso_des_muestra');
            $table->string('materialaso_ubicacion');
            $table->string('materialaso_responsable');
            $table->string('materialaso_identificacion_muestra');
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
        Schema::dropIfExists('material_asociado_solicitud');
    }
}
