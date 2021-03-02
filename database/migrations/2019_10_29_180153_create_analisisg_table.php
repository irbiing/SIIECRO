<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalisisgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisisg', function (Blueprint $table) {
            $table->increments('id_general'); /*'No. de Registro del analisis'*/
            $table->integer('id_obra')->unsigned(); /*'No. de la obra que se hara un analisis'*/
            $table->char('id_de_obra', 50)->nullable(); /*'No. de la obra que se hara un analisis'*/
            $table->string('titulo_obra'); /*'Titulo de la Obra/Pieza/Agrupación'*/
            $table->string('temp_obra'); /*'Temporalidad'*/
            $table->string('epoca_obra')->nullable(); /*'Epoca'*/
            $table->integer('año_de_obra')->nullable(); /*'Año de la obra'*/
            $table->string('tipo_obj_obra'); /*'Tipo de objeto'*/
            $table->string('respon_intervencion'); /*'Responsables ECRO'*/
            $table->integer('anio_temporada_trabajo'); /*'Año de la temporada de trabajo'*/
            $table->date('fecha_de_inicio')->default(now()); /*'Fecha de intervencion'*/
            $table->string('foto')->default('Sin imagen');/*Variable para foto de inicio*/
            $table->string('esquema_muestras')->default('Sin imagen');/*Variable para foto de esquema de toma de muestras*/
            $table->string('alto')->nullable();//variable para la altura
            $table->string('ancho')->nullable();//variable para la anchura
            $table->string('profundidad')->nullable();//variable para la profundidad
            $table->string('diametro')->nullable();//variable para el diametro
            $table->string('tecnica');//variable para la tecnica
            $table->timestamps();

            $table->foreign('id_obra')->references('id')->on('obras')
            ->onUpdate('cascade')
            ->onDelete('cascade');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisisg');
    }
}
