<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Obras', function (Blueprint $table) {
            $table->increments('id'); /*'No. de Registro de la Obra'*/
            $table->char('id_de_obras', 50)->nullable(); /*'No. de la obra que se hara un analisis'*/
            $table->string('titulo_obra'); /*'Título de la Obra/Pieza/Agrupación'*/
            $table->string('temp_obra')->nullable(); /*'Temporalidad'*/
            $table->string('caract_descrip')->nullable(); /*'Caracteristicas Descriptivas'*/
            $table->integer('año')->nullable(); /*'Año de la obra'*/
            $table->binary('año_confirm')->nullable(); /*'Año Confirmado'*/
            $table->binary('año_aproxi')->nullable(); /*'Año Aproximadamente'*/
            $table->string('epoca_obra')->nullable(); /*'Epoca de la obra'*/
            $table->binary('epoca_confirm')->nullable(); /*'Epoca Confirmado'*/
            $table->binary('epoca_aproxi')->nullable(); /*'Epoca Aproximadamente'*/
            $table->string('tipo_bien_cultu'); /*'Tipo de bien cultural'*/
            $table->string('tipo_obj_obra'); /*'Tipo de objeto'*/
            $table->string('lugar_proce_ori')->nullable(); /*'Lugar de Procedencia Original'*/
            $table->string('lugar_proce_act')->nullable(); /*'Lugar de Procedencia Actual'*/
            $table->string('no_inv_obra')->nullable(); /*'No. de Inventario'*/
            $table->string('forma_ingreso'); /*'Forma de Ingreso'*/
            $table->string('sector_obra'); /*'Sector',*/
            $table->string('respon_ecro'); /*'Responsables ECRO'*/
            $table->string('proyecto_obra')->nullable();  /*'Proyecto'*/
            $table->integer('trabajo_obra')->unsigned(); /*'Año de la temporada de trabajo'*/
            $table->integer('no_proyec_obra')->nullable(); /*'No. de proyecto'*/
            $table->char('autor')->nullable();//variable para el autor
            $table->char('cultura')->nullable();//variable para el autor
            $table->integer('temporada_trabajo')->unsigned();//Temporada de trabajo
            $table->date('fecha_de_entrada')->default(now()); /*'Fecha de entrada'*/
            $table->date('fecha_de_salida')->nullable(); /*'Fecha de salida'*/
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
        Schema::dropIfExists('Obras');
    }
}
