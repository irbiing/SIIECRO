<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstratigrafiaSolicitud extends Model
{
    //METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'estratigrafia_solicitud';
    protected $fillable = [
    	'general_id',
    	'estratigrafia_muestra',
    	'estratigrafia_nomenclatura',
    	'estratigrafia_inf_requerida',
    	'estratigrafia_des_muestra',
    	'estratigrafia_ubicacion',
    	'estratigrafia_responsable',
    	'estratigrafia_identificacion_muestra'];
}
