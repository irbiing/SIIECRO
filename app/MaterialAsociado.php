<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialAsociado extends Model
{
	//METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'material_asociado_solicitud';
    protected $fillable = ['general_id','materialaso_muestra','materialaso_nomenclatura','materialaso_inf_requerida','materialaso_des_muestra',
    'materialaso_ubicacion','materialaso_responsable','materialaso_identificacion_muestra'];
}
