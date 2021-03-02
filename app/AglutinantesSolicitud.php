<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AglutinantesSolicitud extends Model
{
    //METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'aglutinante_solicitud';
    protected $fillable = [
    	'general_id',
    	'aglutinante_muestra',
    	'aglutinante_nomenclatura',
    	'aglutinante_inf_requerida',
    	'aglutinante_des_muestra',
    	'aglutinante_ubicacion',
    	'aglutinante_responsable',
    	'aglutinante_identificacion_muestra'];
}
