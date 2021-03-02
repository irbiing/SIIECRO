<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisisG extends Model
{
    //METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
	protected $table = 'analisisg';
    protected $primaryKey = 'id_general';
    protected $fillable = [
        'id_general',
        'id_obra',
        'id_de_obra',
        'titulo_obra',
    	'temp_obra',
    	'epoca_obra',
        'sector_obra',
    	'tipo_obj_obra',
    	'año_de_obra',
    	'respon_intervencion',
    	'anio_temporada_trabajo',
        'fecha_de_inicio',
        'foto'=>'required|image|mimes:jpeg,jpg,png',
        'esquema_muestras'=>'required|image|mimes:jpeg,jpg,png',
        'alto',
        'ancho',	
        'profundidad',
        'diametro',
        'tecnica',
        'analisis'

        
        
    ];

    public function scopeId($query, $id)
{
    if ($id)
        return $query->where('id_obra', 'LIKE', "%$id%");
}

    public function obra()
    {
    	return $this->belongsTo('App\Obras', 'id');
    }
    public function registro()
    {
        return $this->hasMany('App\AnalisisCientifico', 'id_gene');
    }
}
