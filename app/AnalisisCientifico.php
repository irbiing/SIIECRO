<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalisisCientifico extends Model
{
    //METODO PARA ESPECIFICAR LAS VARIABLES QUE USARA ESTE MODELO
    protected $table = 'analisiscientifico';
    protected $primaryKey = 'idcientifico';
    protected $fillable = [
        'idcientifico',
        'id_gene',
        'id_obras',
        'titulo_Obra',
        'epoca',
        'temporada_trabajo',
        'anio_temporada',
        'tecnica',
        'fecha_inicio',
        'nomenclatura_muestra',
        'caracte_analisis',
        'fecha_analisis_cientifico',
        'profesor_responsable',
        'persona_realizo_analisis',
        'forma_obtencion_muestra',
        'esquema',
        'indicaciones',
        'tipo_material',
        'descripcion',
        'microfotografia',
        'info_definir',
        'analisis_morfologico',
        'analisis_microquimico',
        'analisis_elemental',
        'analisis_molecular',
        'analisis_de_tincion',
        'otros',
        'lugar_de_resguardo',
        'analisis_microbiologicos',
        'resultado_conclucion_general',
        'interpretacion_particular' ,
    ];


    public function scopeId($query, $id)
    {
        if ($id)
            return $query->where('idcientifico', 'LIKE', "%$id%");
    }

         public function analisis()
    {
        return $this->belongsTo('App\AnalisisG', 'id_general');
    }

}
