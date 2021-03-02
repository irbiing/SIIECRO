<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AniosTemporada extends Model
{
	//METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'anio_temporada';
    protected $fillable = ['id','obra_id', 'anio_temporada_trabajo'];
}
