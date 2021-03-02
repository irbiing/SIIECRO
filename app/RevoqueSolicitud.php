<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevoqueSolicitud extends Model
{
    //METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'revoque_solicitud';
    protected $fillable = [
    	'general_id',
    	'revoque_muestra',
    	'revoque_nomenclatura',
    	'revoque_inf_requerida',
    	'revoque_des_muestra',
    	'revoque_ubicacion',
    	'revoque_responsable',
    	'revoque_identificacion_muestra'];
}
