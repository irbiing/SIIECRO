<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstratigrafiaSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estratigrafia_solicitud', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('general_id'); // Para vincularlo con la tabla analisig (solicitud de analisis cientifico)
            $table->string('estratigrafia_muestra'); 
            $table->string('estratigrafia_nomenclatura');
            $table->string('estratigrafia_inf_requerida');
            $table->string('estratigrafia_des_muestra');
            $table->string('estratigrafia_ubicacion');
            $table->string('estratigrafia_responsable');
            $table->string('estratigrafia_identificacion_muestra');
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
        Schema::dropIfExists('estratigrafia_solicitud');
    }
}
