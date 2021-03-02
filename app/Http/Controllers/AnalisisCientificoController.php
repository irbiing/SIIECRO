<?php

namespace App\Http\Controllers;

//declaracion de los modelos que se utilizaran en el controlador
use DB;
use App\AnalisisG;
use App\Obras;
use App\SoportesSolicitud;
use App\base_solicitud;
use App\EstratigrafiaSolicitud;
use App\RevoqueSolicitud;
use App\BolSolicitud;
use App\LaminasSolicitud;
use App\PigmentosSolicitud;
use App\AglutinantesSolicitud;
use App\RecubrimientosSolicitud;
use App\otros_solicituds;
use App\biodeterioro_solicitud;
use App\material_agregado_solicitud;
use App\SalesSolicitud;
use App\MaterialAsociado;
use App\AnalisisCientifico;
use Illuminate\Http\Request;
use App\ResultadosAnalisis;

class AnalisisCientificoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Funcion para mandar la consulta de la base de datos a la vista index de registro de analisis cientifico
        $id = $request->get('busqueda');
        $a_cientifico = AnalisisCientifico::orderBy('id_obras', 'like', "%$id%")
        ->paginate(15);
        return view('registro.index',compact('a_cientifico'))
            ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //Funcion para mandar la consulta de la base de datos a la vista de create de registro de analisis cientifico

        $analisisg = AnalisisG::findOrFail($id);
        $tempo = DB::table('temporada_trabajo')->where('obra_id', $analisisg->id_obra)
        ->select('temporada_trabajo.temporada_trabajo')
        ->get();

        //SOPORTE I 
        $soportes = DB::table('soporte_solicitud')->where('general_id', $id)
        ->select('soporte_solicitud.*')
        ->get();
       
        //BASE II
        $baseP = DB::table('base_solicituds')->where('general_id', $id)
        ->select('base_solicituds.*')
        ->get();
        
        //ESTATIGRAFIA III
        $estratigrafia = DB::table('estratigrafia_solicitud')->where('general_id', $id)
        ->select('estratigrafia_solicitud.*')
        ->get();

        //REVOQUE Y ENLUCIDO IV
        $revoque = DB::table('revoque_solicitud')->where('general_id', $id)
        ->select('revoque_solicitud.*')
        ->get();
        
        //BOL V 
        $bol = DB::table('bol_solicitud')->where('general_id', $id)
        ->select('bol_solicitud.*')
        ->get();

        //LAMINAS METALICAS VI
        $lamina = DB::table('laminas_solicitud')->where('general_id', $id)
        ->select('laminas_solicitud.*')
        ->get();

        //PIGMENTOS VII
        $pigmento = DB::table('pigmentos_solicitud')->where('general_id', $id)
        ->select('pigmentos_solicitud.*')
        ->get();

        //AGLUTINANTES VIII
        $aglutinante = DB::table('aglutinante_solicitud')->where('general_id', $id)
        ->select('aglutinante_solicitud.*')
        ->get();

        //RECUBRIMIENTOS IX
        $recubrimiento = DB::table('recubrimiento_solicitud')->where('general_id', $id)
        ->select('recubrimiento_solicitud.*')
        ->get();
        
        //MATERIAL ASOCIADO X
        $maso = DB::table('material_asociado_solicitud')->where('general_id', $id)
        ->select('material_asociado_solicitud.*')
        ->get();

        //SALES XI
        $sal = DB::table('sales_solicitud')->where('general_id', $id)
        ->select('sales_solicitud.*')
        ->get();

        //MATERIAL AGREGADO XII
        $materialag = DB::table('material_agregado_solicitud')->where('general_id', $id)
        ->select('material_agregado_solicitud.*')
        ->get();

        //Biodeterioro XIII
        $biodeterioro = DB::table('biodeterioro_solicitud')->where('general_id', $id)
        ->select('biodeterioro_solicitud.*')
        ->get();

        //OTROS XIV
        $otro = DB::table('otros_solicitud')->where('general_id', $id)
        ->select('otros_solicitud.*')
        ->get();

        return view('registro.create', compact('analisisg','tempo','soportes','baseP','estratigrafia','revoque','bol',
        'lamina','pigmento','aglutinante','recubrimiento','otro','biodeterioro','materialag','sal','maso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Funcion para crear el registro un la base de datos en registro de analisis cientifico
        $request->validate([
            'idcientifico',
            'id_gene',
            'id_obras',
            'titulo_obra',
            'epoca',
            'año_proyecto',
            'temp_trabajo',
            'tecnica',
            //'cultura',
            'fecha_inicio',
            'nomenclatura_muestra',
            'caracte_analisis',
            'fecha_analisis_cientifico'  => 'required',
            'profesor_responsable'  => 'required',
            'persona_realizo_analisis'  => 'required',
            'forma_obtencion_muestra',
            'esquema'  => 'required',
            'indicaciones'  => 'required',
            'tipo_material'  => 'required',
            'descripcion'  => 'required',
            'microfotografia',
            'info_definir'  => 'required',
            'analisis_microestructural', 
            'analisis_microquimico',     
            'analisis_elemental',        
            'analisis_molecular',        
            'analisis_de_tincion',       
            'otros',
            'lugar_de_resguardo',
            'analisis_microbiologicos',
            'resultado_interpretacion',
            'resultado_descripcion',
            'resultado_conclucion_general',
            'interpretacion_particular'  => 'required', 
        ]);

        //Codigo para almacenar imagenes o archivos
        $a_cientifico = (new analisisCientifico)->fill($request->all());
        if ($request->hasFile('esquema')) {
            $nombre=$request->file('esquema')->getClientOriginalName();
            $request->file('esquema')->move('images', $nombre);
            $a_cientifico->esquema = $nombre;
        }
        if ($request->hasFile('microfotografia')) {
           $nombre=$request->file('microfotografia')->getClientOriginalName();
            $request->file('microfotografia')->move('images', $nombre);
            $a_cientifico->microfotografia = $nombre;

        }
        
        
        
            
        
        if($a_cientifico->save()) {
            //Codigo para almacenar mas de un registro
            for ($counter=0; $counter < 7 ; $counter++) { 
                //$obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("resultado_interpretacion{$counter}") != NULL) {

                    if ($request->has("resultado_interpretacion{$counter}")) {
dd($request->resultado_imagenes{$counter});
                         if ($request->hasFile('resultado_imagenes{$counter}')) {
                            
                               $nombre1=$request->file('resultado_imagenes{$counter}')->getClientOriginalName();
                                $request->file('resultado_imagenes{$counter}')->move('images', $nombre1);
                                dd($nombre1);
                                 
                            }

                            if ($request->hasFile('resultado_datos{$counter}')) {
                               $nombre2=$request->file('resultado_datos{$counter}')->getClientOriginalName();
                                $request->file('resultado_datos{$counter}')->move('images', $nombre2);
                                
                            }
                           
                        ResultadosAnalisis::create(['id_registro' => $a_cientifico->idcientifico,
                         'resultado_interpretacion' => $request->get("resultado_interpretacion{$counter}"),
                         'resultado_descripcion' => $request->get("resultado_descripcion{$counter}"),
                         'resultado_imagenes' => $nombre1,
                         'resultado_datos' => $nombre2]);
                        
                    }else{
                        break;
                    }
                }
            }

        } 
   
       return redirect()->route('registro.index')
                        ->with('success','Ficha Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnalisisCientifico  $analisisCientifico
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisisCientifico $analisisCientifico, $id)
    {
        //Funcion para mandar la consulta de la base de datos a la vista de show de registro de analisis cientifico
        $a_cientifico = AnalisisCientifico::findOrFail($id);
        return view('registro.show', compact('a_cientifico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnalisisCientifico  $analisisCientifico
     * @return \Illuminate\Http\Response
     */
    public function edit(AnalisisCientifico $analisisCientifico, $idcientifico)
    {
        //Funcion para mandar la consulta de la base de datos a la vista de edit de registro de analisis cientifico
        $a_cientifico = AnalisisCientifico::findOrFail($idcientifico);
        return view('registro.edit', compact('a_cientifico'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnalisisCientifico  $analisisCientifico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idcientifico)
    {
        //Funcion para actualizar de la base de datos de registro de analisis cientifico
        $a_cientifico = AnalisisCientifico::findOrFail($idcientifico);
        $a_cientifico->id_obras = $request->input('id_obras');
        $a_cientifico->titulo_obra = $request->input('titulo_obra');
        $a_cientifico->temporada_trabajo = $request->input('temporada_trabajo');
        $a_cientifico->epoca = $request->input('epoca');
        $a_cientifico->anio_temporada = $request->input('anio_temporada');
        $a_cientifico->fecha_inicio = $request->input('fecha_inicio');
        $a_cientifico->tecnica = $request->input('tecnica');
        $a_cientifico->nomenclatura_muestra = $request->input('nomenclatura_muestra');
        $a_cientifico->caracte_analisis = $request->input('caracte_analisis');
        $a_cientifico->fecha_analisis_cientifico = $request->input('fecha_analisis_cientifico');
        $a_cientifico->profesor_responsable = $request->input('profesor_responsable');
        $a_cientifico->persona_realizo_analisis = $request->input('persona_realizo_analisis');
        $a_cientifico->forma_obtencion_muestra = $request->input('forma_obtencion_muestra');
        $a_cientifico->indicaciones = $request->input('indicaciones');
        $a_cientifico->tipo_material = $request->input('tipo_material');
        $a_cientifico->descripcion = $request->input('descripcion');
        $a_cientifico->info_definir = $request->input('info_definir');
        $a_cientifico->analisis_morfologico = $request->input('analisis_morfologico');
        $a_cientifico->analisis_microquimico = $request->input('analisis_microquimico');
        $a_cientifico->analisis_elemental = $request->input('analisis_elemental');
        $a_cientifico->analisis_molecular = $request->input('analisis_molecular');
        $a_cientifico->analisis_de_tincion = $request->input('analisis_de_tincion');
        $a_cientifico->otros = $request->input('otros');
        

        
    //metodo para actualizar imagenes
        if ($request->hasFile('esquema')) {
        //$a_cientifico->esquema = $request->file('esquema')->store('public');
        $nombre=$request->file('esquema')->getClientOriginalName();
            $request->file('esquema')->move('images', $nombre);
            $a_cientifico->esquema = $nombre;
    }
    if ($request->hasFile('microfotografia')) {
        //$a_cientifico->esquema = $request->file('esquema')->store('public');
        $nombre=$request->file('microfotografia')->getClientOriginalName();
            $request->file('microfotografia')->move('images', $nombre);
            $a_cientifico->microfotografia = $nombre;
    }

    $a_cientifico->save();
    return redirect()->route('registro.index')->with('success','Registro editado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnalisisCientifico  $analisisCientifico
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnalisisCientifico $analisisCientifico, $idcientifico)
    {
        //Funcion para eliminar de la base de datos de registro de analisis cientifico
        $a_cientifico = AnalisisCientifico::findOrFail($idcientifico);
        $a_cientifico->delete();
        return redirect()->route('registro.index')->with('success','Registro eliminado.');
    }
}
