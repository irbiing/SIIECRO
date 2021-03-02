<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class material_agregado_solicitud extends Model
{
	//METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'material_agregado_solicitud';
    protected $fillable = ['general_id','materialag_muestra','materialag_nomenclatura','materialag_inf_requerida','materialag_des_muestra',
    'materialag_ubicacion','materialag_responsable','materialag_identificacion_muestra'];
}
