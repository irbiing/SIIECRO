<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siecrodata extends Model
{
    //
    protected $table = 'siecrodata';

    protected $fillable = [
    	'No_obra',
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
    	'año_proyec_obra',
    	'no_proyec_obra',
];
}
