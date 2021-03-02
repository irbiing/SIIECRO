<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obras extends Model
{
    //METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $fillable = [
        'id',
        'id_de_obras',
        'titulo_obra',
    	'temp_obra',
    	'caract_descrip',
    	'año',
    	'año_confirm',
    	'año_aproxi',
    	'epoca_obra',
    	'epoca_confirm',
    	'epoca_aproxi',
    	'tipo_bien_cultu',
    	'tipo_obj_obra',
    	'lugar_proce_ori',
    	'lugar_proce_act',
    	'no_inv_obra',
    	'forma_ingreso',
    	'sector_obra',
    	'respon_ecro',
    	'proyecto_obra',
    	'año_trabajo_obra',
		'no_proyec_obra',
		'temporada_trabajo',
        'fecha_de_entrada',
        'fecha_de_salida',
        'autor',
        'cultura'
    ];

    public function scopeId($query, $id)
    {
        if ($id)
            return $query->where('id', 'LIKE', "%$id%");
    }

    public function analisis()
    {
        return $this->hasMany('App\AnalisisG', 'id_obra');
    }

}
