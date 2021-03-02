<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoportesSolicitud extends Model
{
	//METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'soporte_solicitud';
    protected $fillable = ['general_id','soporte_muestra','soporte_nomenclatura','soporte_inf_requerida','soporte_des_muestra',
    'soporte_ubicacion','soporte_responsable','soporte_identificacion_muestra'];
}
