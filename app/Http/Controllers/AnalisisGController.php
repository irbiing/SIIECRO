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

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AnalisisGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index(Request $request)
    {

        //Funcion para mandar la consulta de la base de datos a la vista index de solicitud de analisis cientifico
        $id = $request->get('id_general');
        $Analisisg = AnalisisG::orderBy('id_general', 'DESC')
        ->id($id)
        ->paginate(5);
        return view('analisisg.index',compact('Analisisg'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $id_obra = Obras::with('id')->get(); 
 //algo general...

 //enviamos los datos a la vista
    //return view('analisisg.create', compact('id_obra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Funcion para crear el registro un la base de datos en solicitud de analisis cientifico
        $request->validate([
            'id_general',
            'id_obra',
            'id_de_obra',
            'titulo_obra',
            'temp_obra',
            'epoca_obra',
            'tipo_obj_obra',
            'respon_intervencion',
            'fecha_de_inicio',
            'foto',
            'alto',
            'ancho',    
            'profundidad',
            'diametro',
            'tecnica',
            'analisis',
        ]);

        $analisisg = (new AnalisisG)->fill($request->all());
        
        if ($request->hasFile('foto')) {
            //$analisisg->foto = $request->file('foto')->store('public');

            $nombre=$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images', $nombre);
            $analisisg->foto = $nombre;
        }

        if ($request->hasFile('esquema_muestras')) {
            //$analisisg->foto = $request->file('foto')->store('public');

            $nombre=$request->file('esquema_muestras')->getClientOriginalName();
            $request->file('esquema_muestras')->move('images', $nombre);
            $analisisg->esquema_muestras = $nombre;
        }
        
        
        
            
        //dd($request->all());
        if ($analisisg->save()) {
        
        //METODOS PARA CREAR LOS REGISTROS EN LAS DIFERENTES TABLAS ADICIONALES
            // SOPORTE MUESTRA I
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("Smuestra{$counters}") != NULL) {

                    if ($request->has("Smuestra{$counters}")) {
                        SoportesSolicitud::create(['general_id' => $analisisg->id_general, 
                            'soporte_muestra' => $request->get("Smuestra{$counters}"),
                            'soporte_nomenclatura' => $request->get("Snomenclatura{$counters}"),
                            'soporte_inf_requerida' => $request->get("Sinf_requerida{$counters}"),
                            'soporte_des_muestra' => $request->get("Sdes_muestra{$counters}"),
                            'soporte_ubicacion' => $request->get("Subicacion{$counters}"),
                            'soporte_responsable' => $request->get("Sresponsable{$counters}"),
                            // Se elimina atributo en solicitud de Geovanna
                            // 'soporte_identificacion_muestra'=> $request->get("Siden_muestra{$counters}")
                        ]);
                    }else{
                        break;
                    }
                }
            }
         
        //BASE DE PREPARACION II
             for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("BPmuestra{$counters}") != NULL) {
                    if ($request->has("BPmuestra{$counters}")) {
                        base_solicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'base_muestra' => $request->get("BPmuestra{$counters}"),
                            'base_nomenclatura' => $request->get("BPnomenclatura{$counters}"),
                            'base_inf_requerida' => $request->get("BPinf_requerida{$counters}"),
                            'base_des_muestra' => $request->get("BPdes_muestra{$counters}"),
                            'base_ubicacion' => $request->get("BPubicacion{$counters}"),
                            'base_responsable' => $request->get("BPresponsable{$counters}"),
                            // 'base_identificacion_muestra'=> $request->get("BPiden_muestra{$counters}")
                        ]);
                    }else{
                        break;
                    }
                }
            }
            
            //ESTATIGRAFIA III
            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("Emuestra{$counters}") != NULL) {
                    if ($request->has("Emuestra{$counters}")) {
                        EstratigrafiaSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'estratigrafia_muestra' => $request->get("Emuestra{$counters}"),
                            'estratigrafia_nomenclatura' => $request->get("Enomenclatura{$counters}"),
                            'estratigrafia_inf_requerida' => $request->get("Einf_requerida{$counters}"),
                            'estratigrafia_des_muestra' => $request->get("Edes_muestra{$counters}"),
                            'estratigrafia_ubicacion' => $request->get("Eubicacion{$counters}"),
                            'estratigrafia_responsable' => $request->get("Eresponsable{$counters}"),
                            // 'estratigrafia_identificacion_muestra'=> $request->get("Eiden_muestra{$counters}")
                        ]);
                    }else{
                        break;
                    }
                }
            }

            
            //REVOQUE Y ENLUCIDO IV
            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("REmuestra{$counters}") != NULL) {
                    if ($request->has("REmuestra{$counters}")) {
                        RevoqueSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'revoque_muestra' => $request->get("REmuestra{$counters}"),
                            'revoque_nomenclatura' => $request->get("REnomenclatura{$counters}"),
                            'revoque_inf_requerida' => $request->get("REinf_requerida{$counters}"),
                            'revoque_des_muestra' => $request->get("REdes_muestra{$counters}"),
                            'revoque_ubicacion' => $request->get("REubicacion{$counters}"),
                            'revoque_responsable' => $request->get("REresponsable{$counters}"),
                            // 'revoque_identificacion_muestra'=> $request->get("REiden_muestra{$counters}")
                        ]);
                    }else{
                        break;
                    }
                }
            }
            
            //BOL V
            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("BOLmuestra{$counters}") != NULL) {
                    if ($request->has("BOLmuestra{$counters}")) {
                        BolSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'bol_muestra' => $request->get("BOLmuestra{$counters}"),
                            'bol_nomenclatura' => $request->get("BOLnomenclatura{$counters}"),
                            'bol_inf_requerida' => $request->get("BOLinf_requerida{$counters}"),
                            'bol_des_muestra' => $request->get("BOLdes_muestra{$counters}"),
                            'bol_ubicacion' => $request->get("BOLubicacion{$counters}"),
                            'bol_responsable' => $request->get("BOLresponsable{$counters}"),
                            // 'bol_identificacion_muestra'=> $request->get("BOLiden_muestra{$counters}")
                        ]);
                    }else{
                        break;
                    }
                }
            }

            //LAMINAS METALICAS VI
            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("LMmuestra{$counters}") != NULL) {
                    if ($request->has("LMmuestra{$counters}")) {
                        LaminasSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'laminas_muestra' => $request->get("LMmuestra{$counters}"),
                            'laminas_nomenclatura' => $request->get("LMnomenclatura{$counters}"),
                            'laminas_inf_requerida' => $request->get("LMinf_requerida{$counters}"),
                            'laminas_des_muestra' => $request->get("LMdes_muestra{$counters}"),
                            'laminas_ubicacion' => $request->get("LMubicacion{$counters}"),
                            'laminas_responsable' => $request->get("LMresponsable{$counters}"),
                            // 'laminas_identificacion_muestra'=> $request->get("LMiden_muestra{$counters}")
                        ]);
                    }else{
                        break;
                    }
                }
            }

            //PIGMENTOS VII
            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("Pmuestra{$counters}") != NULL) {
                    if ($request->has("Pmuestra{$counters}")) {
                        PigmentosSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'pigmentos_muestra' => $request->get("Pmuestra{$counters}"),
                            'pigmentos_nomenclatura' => $request->get("Pnomenclatura{$counters}"),
                            'pigmentos_inf_requerida' => $request->get("Pinf_requerida{$counters}"),
                            'pigmentos_des_muestra' => $request->get("Pdes_muestra{$counters}"),
                            'pigmentos_ubicacion' => $request->get("Pubicacion{$counters}"),
                            'pigmentos_responsable' => $request->get("Presponsable{$counters}"),
                            // 'pigmentos_identificacion_muestra'=> $request->get("Piden_muestra{$counters}")
                        ]);
                    }else{
                        break;
                    }
                }
            }

            //AGLUTINANTES VIII
            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("Amuestra{$counters}") != NULL) {
                    if ($request->has("Amuestra{$counters}")) {
                        AglutinantesSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'aglutinante_muestra' => $request->get("Amuestra{$counters}"),
                            'aglutinante_nomenclatura' => $request->get("Anomenclatura{$counters}"),
                            'aglutinante_inf_requerida' => $request->get("Ainf_requerida{$counters}"),
                            'aglutinante_des_muestra' => $request->get("Ades_muestra{$counters}"),
                            'aglutinante_ubicacion' => $request->get("Aubicacion{$counters}"),
                            'aglutinante_responsable' => $request->get("Aresponsable{$counters}"),
                            // 'aglutinante_identificacion_muestra'=> $request->get("Aiden_muestra{$counters}")
                        ]);
                        }else{
                        break;
                    }
                }
            }


            //RECUBRIMIENTOS IX
            for ($counters=0; $counters < 7 ; $counters++) { 
                if ($request->get("Rmuestra{$counters}") != NULL) {
                    if ($request->has("Rmuestra{$counters}")) {
                        RecubrimientosSolicitud::create([
                            'general_id' => $analisisg->id_general, 
                            'recubrimiento_muestra' => $request->get("Rmuestra{$counters}"),
                            'recubrimiento_nomenclatura' => $request->get("Rnomenclatura{$counters}"),
                            'recubrimiento_inf_requerida' => $request->get("Rinf_requerida{$counters}"),
                            'recubrimiento_des_muestra' => $request->get("Rdes_muestra{$counters}"),
                            'recubrimiento_ubicacion' => $request->get("Rubicacion{$counters}"),
                            'recubrimiento_responsable' => $request->get("Rresponsable{$counters}"),
                            // 'recubrimiento_identificacion_muestra'=> $request->get("Riden_muestra{$counters}")
                        ]);
                        }else{
                        break;
                    }
                }
            }
         
            
            //MATERIAL ASOCIADO X
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("MASOmuestra{$counters}") != NULL) {

                    if ($request->has("MASOmuestra{$counters}")) {
                        MaterialAsociado::create(['general_id' => $analisisg->id_general, 
                        'materialaso_muestra' => $request->get("MASOmuestra{$counters}"),
                        'materialaso_nomenclatura' => $request->get("MASOnomenclatura{$counters}"),
                        'materialaso_inf_requerida' => $request->get("MASOinf_requerida{$counters}"),
                        'materialaso_des_muestra' => $request->get("MASOdes_muestra{$counters}"),
                        'materialaso_ubicacion' => $request->get("MASOubicacion{$counters}"),
                        'materialaso_responsable' => $request->get("MASOresponsable{$counters}"),
                        // 'materialaso_identificacion_muestra'=> $request->get("MASOiden_muestra{$counters}")
                    ]);
                    }else{
                        break;
                    }
                }
            }


            
            //SALES XI
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("SALmuestra{$counters}") != NULL) {

                    if ($request->has("SALmuestra{$counters}")) {
                        SalesSolicitud::create(['general_id' => $analisisg->id_general, 
                        'sales_muestra' => $request->get("SALmuestra{$counters}"),
                        'sales_nomenclatura' => $request->get("SALnomenclatura{$counters}"),
                        'sales_inf_requerida' => $request->get("SALinf_requerida{$counters}"),
                        'sales_des_muestra' => $request->get("SALdes_muestra{$counters}"),
                        'sales_ubicacion' => $request->get("SALubicacion{$counters}"),
                        'sales_responsable' => $request->get("SALresponsable{$counters}"),
                        // 'sales_identificacion_muestra'=> $request->get("SALiden_muestra{$counters}")
                    ]);
                    }else{
                        break;
                    }
                }
            }


            //MATERIAL AGREGADO XII
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("MAGmuestra{$counters}") != NULL) {

                    if ($request->has("MAGmuestra{$counters}")) {
                        material_agregado_solicitud::create(['general_id' => $analisisg->id_general, 
                        'materialag_muestra' => $request->get("MAGmuestra{$counters}"),
                        'materialag_nomenclatura' => $request->get("MAGnomenclatura{$counters}"),
                        'materialag_inf_requerida' => $request->get("MAGinf_requerida{$counters}"),
                        'materialag_des_muestra' => $request->get("MAGdes_muestra{$counters}"),
                        'materialag_ubicacion' => $request->get("MAGubicacion{$counters}"),
                        'materialag_responsable' => $request->get("MAGresponsable{$counters}"),
                        // 'materialag_identificacion_muestra'=> $request->get("MAGiden_muestra{$counters}")
                    ]);
                    }else{
                        break;
                    }
                }
            }


            
            //BIODETERIORO XIII 
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("BDTmuestra{$counters}") != NULL) {

                    if ($request->has("BDTmuestra{$counters}")) {
                        biodeterioro_solicitud::create(['general_id' => $analisisg->id_general, 
                        'biodeterioro_muestra' => $request->get("BDTmuestra{$counters}"),
                        'biodeterioro_nomenclatura' => $request->get("BDTnomenclatura{$counters}"),
                        'biodeterioro_inf_requerida' => $request->get("BDTinf_requerida{$counters}"),
                        'biodeterioro_des_muestra' => $request->get("BDTdes_muestra{$counters}"),
                        'biodeterioro_ubicacion' => $request->get("BDTubicacion{$counters}"),
                        'biodeterioro_responsable' => $request->get("BDTresponsable{$counters}"),
                        // 'biodeterioro_identificacion_muestra'=> $request->get("BDTiden_muestra{$counters}")
                    ]);
                    }else{
                        break;
                    }
                }
            }
        


            //OTROS Muestra XIV
            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = AnalisisG::latest('id_general')->first();
                if ($request->get("OTmuestra{$counters}") != NULL) {

                    if ($request->has("OTmuestra{$counters}")) {
                        otros_solicituds::create(['general_id' => $analisisg->id_general, 
                        'otros_muestra' => $request->get("OTmuestra{$counters}"),
                        'otros_nomenclatura' => $request->get("OTnomenclatura{$counters}"),
                        'otros_inf_requerida' => $request->get("OTinf_requerida{$counters}"),
                        'otros_des_muestra' => $request->get("OTdes_muestra{$counters}"),
                        'otros_ubicacion' => $request->get("OTubicacion{$counters}"),
                        'otros_responsable' => $request->get("OTresponsable{$counters}"),
                        // 'otros_identificacion_muestra'=> $request->get("OTiden_muestra{$counters}")
                    ]);
                    }else{
                        break;
                    }
                }
            }
        }  
   
       return redirect()->route('analisisg.index')
                        ->with('success','Ficha Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisisG $analisisG, $id_general)
    {
        //Funcion para mandar la consulta de la base de datos a la vista de show de solicitud de analisis cientifico
        $analisisg = DB::table('analisisg')->where('id_general', $id_general)
        ->select('analisisg.*')
        ->get();
        
        //SOPORTE I 
        $soportes = DB::table('soporte_solicitud')->where('general_id', $id_general)
        ->select('soporte_solicitud.*')
        ->get();
       
        //BASE II
        $baseP = DB::table('base_solicituds')->where('general_id', $id_general)
        ->select('base_solicituds.*')
        ->get();
        
        //ESTATIGRAFIA III
        $estratigrafia = DB::table('estratigrafia_solicitud')->where('general_id', $id_general)
        ->select('estratigrafia_solicitud.*')
        ->get();

        //REVOQUE Y ENLUCIDO IV
        $revoque = DB::table('revoque_solicitud')->where('general_id', $id_general)
        ->select('revoque_solicitud.*')
        ->get();
        
        //BOL V 
        $bol = DB::table('bol_solicitud')->where('general_id', $id_general)
        ->select('bol_solicitud.*')
        ->get();

        //LAMINAS METALICAS VI
        $lamina = DB::table('laminas_solicitud')->where('general_id', $id_general)
        ->select('laminas_solicitud.*')
        ->get();

        //PIGMENTOS VII
        $pigmento = DB::table('pigmentos_solicitud')->where('general_id', $id_general)
        ->select('pigmentos_solicitud.*')
        ->get();

        //AGLUTINANTES VIII
        $aglutinante = DB::table('aglutinante_solicitud')->where('general_id', $id_general)
        ->select('aglutinante_solicitud.*')
        ->get();

        //RECUBRIMIENTOS IX
        $recubrimiento = DB::table('recubrimiento_solicitud')->where('general_id', $id_general)
        ->select('recubrimiento_solicitud.*')
        ->get();
        
        //MATERIAL ASOCIADO X
        $maso = DB::table('material_asociado_solicitud')->where('general_id', $id_general)
        ->select('material_asociado_solicitud.*')
        ->get();

        //SALES XI
        $sal = DB::table('sales_solicitud')->where('general_id', $id_general)
        ->select('sales_solicitud.*')
        ->get();

        //MATERIAL AGREGADO XII
        $materialag = DB::table('material_agregado_solicitud')->where('general_id', $id_general)
        ->select('material_agregado_solicitud.*')
        ->get();

        //Biodeterioro XIII
        $biodeterioro = DB::table('biodeterioro_solicitud')->where('general_id', $id_general)
        ->select('biodeterioro_solicitud.*')
        ->get();

        //OTROS XIV
        $otros = DB::table('otros_solicitud')->where('general_id', $id_general)
        ->select('otros_solicitud.*')
        ->get();
        


        $analisisgs = $analisisg;

        //dd($analisisgs);

        return view('analisisg.show', compact('analisisgs', 'soportes','baseP','estratigrafia','revoque','bol',
        'lamina','pigmento','aglutinante','recubrimiento','otros','biodeterioro','materialag','sal','maso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function edit(AnalisisG $analisisG, $id_general)
    {

        //Funcion para mandar la consulta de la base de datos a la vista de edit de solicitud de analisis cientifico
        $analisisg = DB::table('analisisg')->where('id_general', $id_general)
        ->select('analisisg.*')
        ->get();
       
        //SOPORTE I
        $soportes = DB::table('soporte_solicitud')->where('general_id', $id_general)
        ->select('soporte_solicitud.*')
        ->get();
        
        //BASE II
        $baseP = DB::table('base_solicituds')->where('general_id', $id_general)
        ->select('base_solicituds.*')
        ->get();

        //ESTATIGRAFIA III
        $estratigrafia = DB::table('estratigrafia_solicitud')->where('general_id', $id_general)
        ->select('estratigrafia_solicitud.*')
        ->get();

        //REVOQUE IV
        $revoque = DB::table('revoque_solicitud')->where('general_id', $id_general)
        ->select('revoque_solicitud.*')
        ->get();

        //BOL V 
        $bol = DB::table('bol_solicitud')->where('general_id', $id_general)
        ->select('bol_solicitud.*')
        ->get();

        //LAMINA VI
        $lamina = DB::table('laminas_solicitud')->where('general_id', $id_general)
        ->select('laminas_solicitud.*')
        ->get();

        //PIGMENTO VII
        $pigmento = DB::table('pigmentos_solicitud')->where('general_id', $id_general)
        ->select('pigmentos_solicitud.*')
        ->get();

        //AGLUTINANTE VIII
        $aglutinante = DB::table('aglutinante_solicitud')->where('general_id', $id_general)
        ->select('aglutinante_solicitud.*')
        ->get();

        //RECUBRIMIENTO IX
        $recubrimiento = DB::table('recubrimiento_solicitud')->where('general_id', $id_general)
        ->select('recubrimiento_solicitud.*')
        ->get();


        //MATERIAL ASOCIADO X
        $maso = DB::table('material_asociado_solicitud')->where('general_id', $id_general)
        ->select('material_asociado_solicitud.*')
        ->get();

        //SALES XI
        $sal = DB::table('sales_solicitud')->where('general_id', $id_general)
        ->select('sales_solicitud.*')
        ->get();

        //MATERIAL AGREGADO XII
        $materialag = DB::table('material_agregado_solicitud')->where('general_id', $id_general)
        ->select('material_agregado_solicitud.*')
        ->get();
        
        //BIODETERIORO XIV
        $biodeterioro = DB::table('biodeterioro_solicitud')->where('general_id', $id_general)
        ->select('biodeterioro_solicitud.*')
        ->get();


        //OTROS XV
        $otros = DB::table('otros_solicitud')->where('general_id', $id_general)
        ->select('otros_solicitud.*')
        ->get();

        $analisisgs = $analisisg;

        // SE DAN DE ALTA TODAS LAS TABLAS
        
        return view('analisisg.edit', compact('analisisgs','soportes','baseP','estratigrafia','revoque','bol',
        'lamina','pigmento','aglutinante','recubrimiento','otros','biodeterioro','materialag','sal','maso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_general)
    {
        //Funcion para actualizar de la base de datos de solicitud de analisis cientifico
        $analisisg = AnalisisG::findOrFail($id_general);
        $analisisg->diametro = $request->input('diametro');
        $analisisg->profundidad = $request->input('profundidad');
        $analisisg->ancho = $request->input('ancho');
        $analisisg->alto = $request->input('alto');
        $analisisg->tecnica = $request->input('tecnica');
        $analisisg->respon_intervencion = $request->input('respon_intervencion');
        $analisisg->fecha_de_inicio = $request->input('fecha_de_inicio');
        if ($request->hasFile('esquema_muestras')) {
        $nombre=$request->file('esquema_muestras')->getClientOriginalName();
            $request->file('esquema_muestras')->move('images', $nombre);
            $analisisg->esquema_muestras = $nombre;
    }
        //DECLARACION DE LAS XV TABLAS    
    //dd($analisisg);
        //SOPORTE I
        $soporte = SoportesSolicitud::where('general_id', $id_general)->get();
       
        //BASE   II
        $baseP = base_solicitud::where('general_id', $id_general)->get();
        
        //ESTATIGRAFIA III
        $estratigrafia = EstratigrafiaSolicitud::where('general_id', $id_general)->get();
        
        //REVOQUE IV
        $revoque = RevoqueSolicitud::where('general_id', $id_general)->get();
        
        //BOL V
        $bol = BolSolicitud::where('general_id', $id_general)->get();
        
        //LAMINA VI 
        $lamina = LaminasSolicitud::where('general_id', $id_general)->get();
        
        //PIGMENTO VII
        $pigmento = PigmentosSolicitud::where('general_id', $id_general)->get();
        
        //AGLUTINANTE VIII
        $aglutinante = AglutinantesSolicitud::where('general_id', $id_general)->get();
        
        //RECUBRIMIENTO IX
        $recubrimiento = RecubrimientosSolicitud::where('general_id', $id_general)->get();

        //MATERIAL ASOCIADO X
        $maso = MaterialAsociado::where('general_id', $id_general)->get();

        //SALES XI
        $sal = SalesSolicitud::where('general_id' , $id_general)->get();

        //MATERIAL AGREGADO XII
        $matag = material_agregado_solicitud::where('general_id', $id_general)->get();

        //BIODETERIORO XIII
        $biodeterioro = biodeterioro_solicitud::where('general_id', $id_general)->get();

        //OTROS XIV
        $otro = otros_solicituds::where('general_id', $id_general)->get();

        //CONTADORES 
        $contador_soporte = 0;   
        $contador_base = 0;    
        $contador_estratigrafia =0;
        $contador_revoque = 0;
        $contador_bol = 0;
        $contador_laminas = 0;
        $contador_pigmentos = 0;
        $contador_aglutinante = 0;
        $contador_recubrimiento = 0;  
        $contador_maso = 0;     
        $contador_sal = 0;         
        $contador_matag = 0;    
        $contador_biodeterioro = 0; 
        $contador_otro = 0;     
        //dd($request->all());

        //METODO DE ACTUALIZACION DE SOPORTE I
        foreach ($soporte as $soportes) {
        $soportes->soporte_muestra = $request->input("Smuestra_edit{$contador_soporte}");
        $soportes->soporte_nomenclatura = $request->input("Snomenclatura_edit{$contador_soporte}");  
        $soportes->soporte_inf_requerida = $request->input("Sinf_requerida_edit{$contador_soporte}");
        $soportes->soporte_des_muestra = $request->input("Sdes_muestra_edit{$contador_soporte}");
        $soportes->soporte_ubicacion = $request->input("Subicacion_edit{$contador_soporte}");
        $soportes->soporte_responsable = $request->input("Sresponsable_edit{$contador_soporte}");
        // Se elimina atributo en solicitud de Geovanna
        // $soportes->soporte_identificacion_muestra = $request->input("Siden_muestra_edit{$contador_soporte}");
        $contador_soporte +=1;
        //dd($soportes);
        $soportes->save();

        if ($request->has('Smuestra' . $contador_soporte)) {
            SoportesSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'soporte_muestra' => $request->input("Smuestra{$contador_soporte}"),
                    'soporte_nomenclatura' => $request->input("Snomenclatura{$contador_soporte}"),
                    'soporte_inf_requerida' => $request->input("Sinf_requerida{$contador_soporte}"),
                    'soporte_des_muestra' => $request->input("Sdes_muestra{$contador_soporte}"),
                    'soporte_ubicacion' => $request->input("Subicacion{$contador_soporte}"),
                    'soporte_responsable' => $request->input("Sresponsable{$contador_soporte}"),
                    // Se elimina atributo en solicitud de Geovanna
                    // 'soporte_identificacion_muestra'=> $request->input("Siden_muestra{$contador_soporte}")
                ]
            );
        }       
    }

    //METODO DE ACTUALIZACION DE  BASE II
        foreach ($baseP as $basesP) {
        $basesP->base_muestra = $request->input("BPmuestra_edit{$contador_base}");
        $basesP->base_nomenclatura = $request->input("BPnomenclatura_edit{$contador_base}");  
        $basesP->base_inf_requerida = $request->input("BPinf_requerida_edit{$contador_base}");
        $basesP->base_des_muestra = $request->input("BPdes_muestra_edit{$contador_base}");
        $basesP->base_ubicacion = $request->input("BPubicacion_edit{$contador_base}");
        $basesP->base_responsable = $request->input("BPresponsable_edit{$contador_base}");
        // $basesP->base_identificacion_muestra = $request->input("BPiden_muestra_edit{$contador_base}");
        $contador_base +=1;
        $basesP->save();

        if ($request->has('BPmuestra' . $contador_base)) {
            base_solicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'base_muestra' => $request->get("BPmuestra{$contador_base}"),
                    'base_nomenclatura' => $request->get("BPnomenclatura{$contador_base}"),
                    'base_inf_requerida' => $request->get("BPinf_requerida{$contador_base}"),
                    'base_des_muestra' => $request->get("BPdes_muestra{$contador_base}"),
                    'base_ubicacion' => $request->get("BPubicacion{$contador_base}"),
                    'base_responsable' => $request->get("BPresponsable{$contador_base}"),
                    // 'base_identificacion_muestra'=> $request->get("BPiden_muestra{$contador_base}")
                ]
            );
        }       
    }

    //ESTRATIGRAFIA III

    foreach ($estratigrafia as $estratigrafias) {
        $estratigrafias->estratigrafia_muestra = $request->input("Emuestra_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_nomenclatura = $request->input("Enomenclatura_edit{$contador_estratigrafia}");  
        $estratigrafias->estratigrafia_inf_requerida = $request->input("Einf_requerida_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_des_muestra = $request->input("Edes_muestra_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_ubicacion = $request->input("Eubicacion_edit{$contador_estratigrafia}");
        $estratigrafias->estratigrafia_responsable = $request->input("Eresponsable_edit{$contador_estratigrafia}");
        // $estratigrafias->estratigrafia_identificacion_muestra = $request->input("Eiden_muestra_edit{$contador_estratigrafia}");
        $contador_estratigrafia +=1;
        $estratigrafias->save();

        if ($request->has('Emuestra' . $contador_estratigrafia)) {
            EstratigrafiaSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'estratigrafia_muestra' => $request->get("Emuestra{$contador_estratigrafia}"),
                    'estratigrafia_nomenclatura' => $request->get("Enomenclatura{$contador_estratigrafia}"),
                    'estratigrafia_inf_requerida' => $request->get("Einf_requerida{$contador_estratigrafia}"),
                    'estratigrafia_des_muestra' => $request->get("Edes_muestra{$contador_estratigrafia}"),
                    'estratigrafia_ubicacion' => $request->get("Eubicacion{$contador_estratigrafia}"),
                    'estratigrafia_responsable' => $request->get("Eresponsable{$contador_estratigrafia}"),
                    // 'estratigrafia_identificacion_muestra'=> $request->get("Eiden_muestra{$contador_estratigrafia}")
                ]
            );
        }       
    }

    //REVOQUE IV

     foreach ($revoque as $revoques) {
        $revoques->revoque_muestra = $request->input("REmuestra_edit{$contador_revoque}");
        $revoques->revoque_nomenclatura = $request->input("REnomenclatura_edit{$contador_revoque}");  
        $revoques->revoque_inf_requerida = $request->input("REinf_requerida_edit{$contador_revoque}");
        $revoques->revoque_des_muestra = $request->input("REdes_muestra_edit{$contador_revoque}");
        $revoques->revoque_ubicacion = $request->input("REubicacion_edit{$contador_revoque}");
        $revoques->revoque_responsable = $request->input("REresponsable_edit{$contador_revoque}");
        // $revoques->revoque_identificacion_muestra = $request->input("REiden_muestra_edit{$contador_revoque}");
        $contador_revoque +=1;
        $revoques->save();

        if ($request->has('REmuestra' . $contador_revoque)) {
            RevoqueSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'revoque_muestra' => $request->get("REmuestra{$contador_revoque}"),
                    'revoque_nomenclatura' => $request->get("REnomenclatura{$contador_revoque}"),
                    'revoque_inf_requerida' => $request->get("REinf_requerida{$contador_revoque}"),
                    'revoque_des_muestra' => $request->get("REdes_muestra{$contador_revoque}"),
                    'revoque_ubicacion' => $request->get("REubicacion{$contador_revoque}"),
                    'revoque_responsable' => $request->get("REresponsable{$contador_revoque}"),
                    // 'revoque_identificacion_muestra'=> $request->get("REiden_muestra{$contador_revoque}")
                ]
            );
        }       
    }

    // BOL V

    foreach ($bol as $bols) {
        $bols->bol_muestra = $request->input("BOLmuestra_edit{$contador_bol}");
        $bols->bol_nomenclatura = $request->input("BOLnomenclatura_edit{$contador_bol}");  
        $bols->bol_inf_requerida = $request->input("BOLinf_requerida_edit{$contador_bol}");
        $bols->bol_des_muestra = $request->input("BOLdes_muestra_edit{$contador_bol}");
        $bols->bol_ubicacion = $request->input("BOLubicacion_edit{$contador_bol}");
        $bols->bol_responsable = $request->input("BOLresponsable_edit{$contador_bol}");
        // $bols->bol_identificacion_muestra = $request->input("BOLiden_muestra_edit{$contador_bol}");
        $contador_bol +=1;
        //dd($bols);
        $bols->save();

        if ($request->has('BOLmuestra' . $contador_bol)) {
            BolSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'bol_muestra' => $request->get("BOLmuestra{$contador_bol}"),
                    'bol_nomenclatura' => $request->get("BOLnomenclatura{$contador_bol}"),
                    'bol_inf_requerida' => $request->get("BOLinf_requerida{$contador_bol}"),
                    'bol_des_muestra' => $request->get("BOLdes_muestra{$contador_bol}"),
                    'bol_ubicacion' => $request->get("BOLubicacion{$contador_bol}"),
                    'bol_responsable' => $request->get("BOLresponsable{$contador_bol}"),
                    // 'bol_identificacion_muestra'=> $request->get("BOLiden_muestra{$contador_bol}")
                ]
            );
        }       
    }

    //LAMINAS METALICAS VI

     foreach ($lamina as $laminas) {
        $laminas->laminas_muestra = $request->input("LMmuestra_edit{$contador_laminas}");
        $laminas->laminas_nomenclatura = $request->input("LMnomenclatura_edit{$contador_laminas}");  
        $laminas->laminas_inf_requerida = $request->input("LMinf_requerida_edit{$contador_laminas}");
        $laminas->laminas_des_muestra = $request->input("LMdes_muestra_edit{$contador_laminas}");
        $laminas->laminas_ubicacion = $request->input("LMubicacion_edit{$contador_laminas}");
        $laminas->laminas_responsable = $request->input("LMresponsable_edit{$contador_laminas}");
        // $laminas->laminas_identificacion_muestra = $request->input("LMiden_muestra_edit{$contador_laminas}");
        $contador_laminas +=1;
        $laminas->save();

        if ($request->has('LMmuestra' . $contador_laminas)) {
            LaminasSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'laminas_muestra' => $request->get("LMmuestra{$contador_laminas}"),
                    'laminas_nomenclatura' => $request->get("LMnomenclatura{$contador_laminas}"),
                    'laminas_inf_requerida' => $request->get("LMinf_requerida{$contador_laminas}"),
                    'laminas_des_muestra' => $request->get("LMdes_muestra{$contador_laminas}"),
                    'laminas_ubicacion' => $request->get("LMubicacion{$contador_laminas}"),
                    'laminas_responsable' => $request->get("LMresponsable{$contador_laminas}"),
                    // 'laminas_identificacion_muestra'=> $request->get("LMiden_muestra{$contador_laminas}")
                ]
            );
        }       
    }

    //PIGMENTOS VII

    foreach ($pigmento as $pigmentos) {
        $pigmentos->pigmentos_muestra = $request->input("Pmuestra_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_nomenclatura = $request->input("Pnomenclatura_edit{$contador_pigmentos}");  
        $pigmentos->pigmentos_inf_requerida = $request->input("Pinf_requerida_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_des_muestra = $request->input("Pdes_muestra_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_ubicacion = $request->input("Pubicacion_edit{$contador_pigmentos}");
        $pigmentos->pigmentos_responsable = $request->input("Presponsable_edit{$contador_pigmentos}");
        // $pigmentos->pigmentos_identificacion_muestra = $request->input("Piden_muestra_edit{$contador_pigmentos}");
        $contador_pigmentos +=1;
        $pigmentos->save();

        if ($request->has('Pmuestra' . $contador_pigmentos)) {
            PigmentosSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'pigmentos_muestra' => $request->get("Pmuestra{$contador_pigmentos}"),
                    'pigmentos_nomenclatura' => $request->get("Pnomenclatura{$contador_pigmentos}"),
                    'pigmentos_inf_requerida' => $request->get("Pinf_requerida{$contador_pigmentos}"),
                    'pigmentos_des_muestra' => $request->get("Pdes_muestra{$contador_pigmentos}"),
                    'pigmentos_ubicacion' => $request->get("Pubicacion{$contador_pigmentos}"),
                    'pigmentos_responsable' => $request->get("Presponsable{$contador_pigmentos}"),
                    // 'pigmentos_identificacion_muestra'=> $request->get("Piden_muestra{$contador_pigmentos}")
                ]
            );
        }       
    }

    //AGLUTINANTES VIII

    foreach ($aglutinante as $aglutinantes) {
        $aglutinantes->aglutinante_muestra = $request->input("Amuestra_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_nomenclatura = $request->input("Anomenclatura_edit{$contador_aglutinante}");  
        $aglutinantes->aglutinante_inf_requerida = $request->input("Ainf_requerida_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_des_muestra = $request->input("Ades_muestra_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_ubicacion = $request->input("Aubicacion_edit{$contador_aglutinante}");
        $aglutinantes->aglutinante_responsable = $request->input("Aresponsable_edit{$contador_aglutinante}");
        // $aglutinantes->aglutinante_identificacion_muestra = $request->input("Aiden_muestra_edit{$contador_aglutinante}");
        $contador_aglutinante +=1;
        $aglutinantes->save();

        if ($request->has('Amuestra' . $contador_aglutinante)) {
            AglutinantesSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'aglutinante_muestra' => $request->get("Amuestra{$contador_aglutinante}"),
                    'aglutinante_nomenclatura' => $request->get("Anomenclatura{$contador_aglutinante}"),
                    'aglutinante_inf_requerida' => $request->get("Ainf_requerida{$contador_aglutinante}"),
                    'aglutinante_des_muestra' => $request->get("Ades_muestra{$contador_aglutinante}"),
                    'aglutinante_ubicacion' => $request->get("Aubicacion{$contador_aglutinante}"),
                    'aglutinante_responsable' => $request->get("Aresponsable{$contador_aglutinante}"),
                    // 'aglutinante_identificacion_muestra'=> $request->get("Aiden_muestra{$contador_aglutinante}")
                ]
            );
        }       
    }

    //RECUBRIOMIENTOSIX

    foreach ($recubrimiento as $recubrimientos) {
        $recubrimientos->recubrimiento_muestra = $request->input("Rmuestra_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_nomenclatura = $request->input("Rnomenclatura_edit{$contador_recubrimiento  }");  
        $recubrimientos->recubrimiento_inf_requerida = $request->input("Rinf_requerida_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_des_muestra = $request->input("Rdes_muestra_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_ubicacion = $request->input("Rubicacion_edit{$contador_recubrimiento}");
        $recubrimientos->recubrimiento_responsable = $request->input("Rresponsable_edit{$contador_recubrimiento}");
        // $recubrimientos->recubrimiento_identificacion_muestra = $request->input("Riden_muestra_edit{$contador_recubrimiento}");
        $contador_recubrimiento +=1;
        $recubrimientos->save();

        if ($request->has('Rmuestra' . $contador_recubrimiento )) {
            RecubrimientosSolicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'recubrimiento_muestra' => $request->get("Rmuestra{$contador_recubrimiento }"),
                    'recubrimiento_nomenclatura' => $request->get("Rnomenclatura{$contador_recubrimiento }"),
                    'recubrimiento_inf_requerida' => $request->get("Rinf_requerida{$contador_recubrimiento }"),
                    'recubrimiento_des_muestra' => $request->get("Rdes_muestra{$contador_recubrimiento }"),
                    'recubrimiento_ubicacion' => $request->get("Rubicacion{$contador_recubrimiento }"),
                    'recubrimiento_responsable' => $request->get("Rresponsable{$contador_recubrimiento }"),
                    // 'recubrimiento_identificacion_muestra'=> $request->get("Riden_muestra{$contador_recubrimiento  }")
                ]
            );
        }       
    }



    //METODO DE ACTUALIZACION MATERIAL ASOCIADO X
    foreach ($maso as $materialaso) {
        $materialaso->materialaso_muestra = $request->input("MASOmuestra_edit{$contador_maso}");
        $materialaso->materialaso_nomenclatura = $request->input("MASOnomenclatura_edit{$contador_maso}");  
        $materialaso->materialaso_inf_requerida = $request->input("MASOinf_requerida_edit{$contador_maso}");
        $materialaso->materialaso_des_muestra = $request->input("MASOdes_muestra_edit{$contador_maso}");
        $materialaso->materialaso_ubicacion = $request->input("MASOubicacion_edit{$contador_maso}");
        $materialaso->materialaso_responsable = $request->input("MASOresponsable_edit{$contador_maso}");
        // $materialaso->materialaso_identificacion_muestra = $request->input("MASOiden_muestra_edit{$contador_maso}");
        $contador_maso +=1;
        //dd($materialaso);
        $materialaso->save();

        if ($request->has('MASOmuestra' . $contador_maso)) {
            MaterialAsociado::firstOrCreate(
                [   
                    'general_id' => $analisisg->id_general, 
                    'materialaso_muestra' => $request->get("MASOmuestra{$contador_maso}"),
                    'materialaso_nomenclatura' => $request->get("MASOnomenclatura{$contador_maso}"),
                    'materialaso_inf_requerida' => $request->get("MASOinf_requerida{$contador_maso}"),
                    'materialaso_des_muestra' => $request->get("MASOdes_muestra{$contador_maso}"),
                    'materialaso_ubicacion' => $request->get("MASOubicacion{$contador_maso}"),
                    'materialaso_responsable' => $request->get("MASOresponsable{$contador_maso}"),
                    // 'materialaso_identificacion_muestra'=> $request->get("MASOiden_muestra{$contador_maso}")
                ]
            );
        }       
    }

    //METODO DE ACTUALIZACION SALES XI
    foreach ($sal as $sales) {
        $sales->sales_muestra = $request->input("SALmuestra_edit{$contador_sal}");
        $sales->sales_nomenclatura = $request->input("SALnomenclatura_edit{$contador_sal}");  
        $sales->sales_inf_requerida = $request->input("SALinf_requerida_edit{$contador_sal}");
        $sales->sales_des_muestra = $request->input("SALdes_muestra_edit{$contador_sal}");
        $sales->sales_ubicacion = $request->input("SALubicacion_edit{$contador_sal}");
        $sales->sales_responsable = $request->input("SALresponsable_edit{$contador_sal}");
        // $sales->sales_identificacion_muestra = $request->input("SALiden_muestra_edit{$contador_sal}");
        $contador_sal +=1;
        //dd($sales);
        $sales->save();

        if ($request->has('SALmuestra' . $contador_sal)) {
            SalesSolicitud::firstOrCreate(
                [   
                    'general_id' => $analisisg->id_general, 
                    'sales_muestra' => $request->get("SALmuestra{$contador_sal}"),
                    'sales_nomenclatura' => $request->get("SALnomenclatura{$contador_sal}"),
                    'sales_inf_requerida' => $request->get("SALinf_requerida{$contador_sal}"),
                    'sales_des_muestra' => $request->get("SALdes_muestra{$contador_sal}"),
                    'sales_ubicacion' => $request->get("SALubicacion{$contador_sal}"),
                    'sales_responsable' => $request->get("SALresponsable{$contador_sal}"),
                    // 'sales_identificacion_muestra'=> $request->get("SALiden_muestra{$contador_sal}")
                ]
            );
        }       
    }


    
    //METODO DE ACTUALIZACION MATERIAL AGREGADO XII
    foreach ($matag as $materialags) {
        $materialags->materialag_muestra = $request->input("MAGmuestra_edit{$contador_matag}");
        $materialags->materialag_nomenclatura = $request->input("MAGnomenclatura_edit{$contador_matag}");  
        $materialags->materialag_inf_requerida = $request->input("MAGinf_requerida_edit{$contador_matag}");
        $materialags->materialag_des_muestra = $request->input("MAGdes_muestra_edit{$contador_matag}");
        $materialags->materialag_ubicacion = $request->input("MAGubicacion_edit{$contador_matag}");
        $materialags->materialag_responsable = $request->input("MAGresponsable_edit{$contador_matag}");
        // $materialags->materialag_identificacion_muestra = $request->input("MAGiden_muestra_edit{$contador_matag}");
        $contador_matag +=1;
        $materialags->save();

        if ($request->has('MAGmuestra' . $contador_matag)) {
            material_agregado_solicitud::firstOrCreate(
                [   
                    'general_id' => $analisisg->id_general, 
                    'materialag_muestra' => $request->get("MAGmuestra{$contador_matag}"),
                    'materialag_nomenclatura' => $request->get("MAGnomenclatura{$contador_matag}"),
                    'materialag_inf_requerida' => $request->get("MAGinf_requerida{$contador_matag}"),
                    'materialag_des_muestra' => $request->get("MAGdes_muestra{$contador_matag}"),
                    'materialag_ubicacion' => $request->get("MAGubicacion{$contador_matag}"),
                    'materialag_responsable' => $request->get("MAGresponsable{$contador_matag}"),
                    // 'materialag_identificacion_muestra'=> $request->get("MAGiden_muestra{$contador_matag}")
                ]
            );
        }       
    }




    //METODO DE ACTUALIZACION BIODETERIORO XIII
    foreach ($biodeterioro as $biodeterioros) {
        $biodeterioros->biodeterioro_muestra = $request->input("BDTmuestra_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_nomenclatura = $request->input("BDTnomenclatura_edit{$contador_biodeterioro}");  
        $biodeterioros->biodeterioro_inf_requerida = $request->input("BDTinf_requerida_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_des_muestra = $request->input("BDTdes_muestra_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_ubicacion = $request->input("BDTubicacion_edit{$contador_biodeterioro}");
        $biodeterioros->biodeterioro_responsable = $request->input("BDTresponsable_edit{$contador_biodeterioro}");
        // $biodeterioros->biodeterioro_identificacion_muestra = $request->input("BDTiden_muestra_edit{$contador_biodeterioro}");
        $contador_biodeterioro +=1;
        $biodeterioros->save();

        if ($request->has('BDTmuestra' . $contador_biodeterioro)) {
            biodeterioro_solicitud::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'biodeterioro_muestra' => $request->get("BDTmuestra{$contador_biodeterioro}"),
                    'biodeterioro_nomenclatura' => $request->get("BDTnomenclatura{$contador_biodeterioro}"),
                    'biodeterioro_inf_requerida' => $request->get("BDTinf_requerida{$contador_biodeterioro}"),
                    'biodeterioro_des_muestra' => $request->get("BDTdes_muestra{$contador_biodeterioro}"),
                    'biodeterioro_ubicacion' => $request->get("BDTubicacion{$contador_biodeterioro}"),
                    'biodeterioro_responsable' => $request->get("BDTresponsable{$contador_biodeterioro}"),
                    // 'biodeterioro_identificacion_muestra'=> $request->get("BDTiden_muestra{$contador_biodeterioro}")
                ]
            );
        }       
    }


    //METODO DE ACTUALIZACION OTROS XIV
    foreach ($otro as $otros) {
        $otros->otros_muestra = $request->input("OTmuestra_edit{$contador_otro}");
        $otros->otros_nomenclatura = $request->input("OTnomenclatura_edit{$contador_otro}");  
        $otros->otros_inf_requerida = $request->input("OTinf_requerida_edit{$contador_otro}");
        $otros->otros_des_muestra = $request->input("OTdes_muestra_edit{$contador_otro}");
        $otros->otros_ubicacion = $request->input("OTubicacion_edit{$contador_otro}");
        $otros->otros_responsable = $request->input("OTresponsable_edit{$contador_otro}");
        // $otros->otros_identificacion_muestra = $request->input("OTiden_muestra_edit{$contador_otro}");
        $contador_otro +=1;
        $otros->save();

        if ($request->has('OTmuestra' . $contador_base)) {
            otros_solicituds::firstOrCreate(
                [
                    'general_id' => $analisisg->id_general, 
                    'otros_muestra' => $request->get("OTmuestra{$contador_otro}"),
                    'otros_nomenclatura' => $request->get("OTnomenclatura{$contador_otro}"),
                    'otros_inf_requerida' => $request->get("OTinf_requerida{$contador_otro}"),
                    'otros_des_muestra' => $request->get("OTdes_muestra{$contador_otro}"),
                    'otros_ubicacion' => $request->get("OTubicacion{$contador_otro}"),
                    'otros_responsable' => $request->get("OTresponsable{$contador_otro}"),
                    // 'otros_identificacion_muestra'=> $request->get("OTiden_muestra{$contador_otro}")
                ]
            );
        }       
    }

    $analisisg->save();
    return redirect()->route('analisisg.index')->with('success','Solicitud Editada.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnalisisG  $analisisG
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnalisisG $analisisG, $id_general)
    {
        //Funcion para eliminar de la base de datos de solicitud de analisis cientifico
        $analisisg = AnalisisG::findOrFail($id_general);
    $analisisg->delete();
    return redirect()->route('analisisg.index')->with('success','Solicitud Eliminada.');
    }
}
