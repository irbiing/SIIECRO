<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalisiscientificoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TABLA DE REGISTRO DE ANALISIS CINETIFICO
        Schema::create('analisiscientifico', function (Blueprint $table) {
            $table->increments('idcientifico');//ID PARA CONTROL DE BD
            $table->unsignedInteger('id_gene');//ID PARA ASOCIAR CON LA TABLA DE SOLICITUD DE ANALISIS CIENTIFICO
            $table->char('id_obras', 50)->nullable(); //ID PARA ASOCIAR CON LA TABLA DE OBRAS
            $table->string('titulo_obra');//se jala de la segunda ficha
            $table->string('epoca');//se jala de la segunda ficha
            $table->string('temporada_trabajo');//se jala de la primera ficha
            $table->integer('anio_temporada');//se jala de la segunda ficha
            $table->string('tecnica');//se jala de la segunda ficha
            $table->date('fecha_inicio');//se jala de la segunda ficha
            $table->string('nomenclatura_muestra');//se jala de la segunda ficha de los analisis
            $table->string('lugar_de_resguardo'); //LUGAR DE RESGUARDO
            $table->string('caracte_analisis'); //Caracterización de análisis
            $table->date('fecha_analisis_cientifico'); //FECHA QUE SE REALIZO EL ANALISIS CIENTIFICO
            $table->string('profesor_responsable');//PROFESOR RESPONSABLE
            $table->string('persona_realizo_analisis');//ALUMNO QUE REALIZO EL ANALISIS
            $table->string('forma_obtencion_muestra');//FORMA EN QUE SE OBTUVO LA MUESTRA
            $table->string('esquema')->default('Sin imagen');//Son parte de la ubicacion de la toma de muestra--Son Imagenes
            $table->string('indicaciones');//Son parte de ubicacion de la toma de muestra
            $table->string('tipo_material');//Son parte de caracteristicas de observacion preeliminar 
            $table->string('descripcion');//Son parte de caracteristicas de observacion preeliminar 
            $table->string('microfotografia')->default('Sin imagen');//Son parte de caracteristicas de observacion preeliminar--Son Imagenes
            $table->string('info_definir'); //INFORMACION POR DEFINIR
            $table->string('analisis_morfologico'); //Parte de analisis a realizar.
            $table->string('analisis_microquimico');     //Parte de analisis a realizar.
            $table->string('analisis_elemental');        //Parte de analisis a realizar.
            $table->string('analisis_molecular');        //Parte de analisis a realizar.
            $table->string('analisis_de_tincion');       //Parte de analisis a realizar.
            $table->string('analisis_microbiologicos');       //Parte de analisis a realizar.
            $table->string('otros');                     //Parte de analisis a realizar.
            $table->string('resultado_conclucion_general'); //CONCLUCION GENERAL
            $table->string('interpretacion_particular');//INTERPETACION PARTICULAR
            //RESULTADO DE ANALISIS CON MICROSCOPIO OPTICO
            //$table->string('resultado_interpretacion'); // van en otra tabla my friend
            //$table->string('resultado_descripcion');
            //$table->string('resultado_imagenes')->default('Sin imagen');             //SON IMAGENES.
            //$table->string('resultado_datos')->default('Sin imagen');                //SON IMAGENES.
            
            
            $table->timestamps();

            $table->foreign('id_gene')->references('id_general')->on('analisisg')
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
        Schema::dropIfExists('analisiscientifico');
    }
}
