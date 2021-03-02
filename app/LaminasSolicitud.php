<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaminasSolicitud extends Model
{
    //METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'laminas_solicitud';
    protected $fillable = [
    	'general_id',
    	'laminas_muestra',
    	'laminas_nomenclatura',
    	'laminas_inf_requerida',
    	'laminas_des_muestra',
    	'laminas_ubicacion',
    	'laminas_responsable',
    	'laminas_identificacion_muestra'];
}
