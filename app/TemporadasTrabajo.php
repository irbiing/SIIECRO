<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporadasTrabajo extends Model
{
	//METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'temporada_trabajo';
    protected $fillable = ['obra_id', 'temporada_trabajo'];

}
