<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class biodeterioro_solicitud extends Model
{
	//METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'biodeterioro_solicitud';
    protected $fillable = ['general_id','biodeterioro_muestra','biodeterioro_nomenclatura','biodeterioro_inf_requerida','biodeterioro_des_muestra',
    'biodeterioro_ubicacion','biodeterioro_responsable','biodeterioro_identificacion_muestra'];
}
