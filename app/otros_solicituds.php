<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class otros_solicituds extends Model
{
	//METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'otros_solicitud';
    protected $fillable = ['general_id','otros_muestra','otros_nomenclatura','otros_inf_requerida','otros_des_muestra',
    'otros_ubicacion','otros_responsable','otros_identificacion_muestra'];
}
