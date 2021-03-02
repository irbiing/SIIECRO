<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecubrimientosSolicitud extends Model
{
    //METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'recubrimiento_solicitud';
    protected $fillable = [
    	'general_id',
    	'recubrimiento_muestra',
    	'recubrimiento_nomenclatura',
    	'recubrimiento_inf_requerida',
    	'recubrimiento_des_muestra',
    	'recubrimiento_ubicacion',
    	'recubrimiento_responsable',
    	'recubrimiento_identificacion_muestra'];
}
