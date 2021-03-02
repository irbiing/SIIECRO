<?php

namespace App\Http\Controllers;

//declaracion de los modelos que se utilizaran en el controlador
use DB;
use App\AniosTemporada;
use App\Obras;
use App\AnalisisG;
use App\TemporadasTrabajo;
use Illuminate\Http\Request;

class ObrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail(Request $request)
    {
        //Llamando a los campos
        $nombre= $_POST['nombre'];
        $correo= $_POST['correo'];
        $telefono= $_POST['telefono'];
        $mensaje= $_POST['mensaje'];


        // Datos para el correo
        $destinatario ="tonatiuhgarciarios@gmail.com";
        $asunto = "Contacto desde nuestra web";


        $carta = "De: $nombre\n" ;
        $carta .= "Correo: $correo\n";
        $carta .= "Telefono: $telefono\n";
        $carta .= "Mensaje: $mensaje";

        //Enviando mensaje
        mail($destinatario, $asunto, $carta);
        header('Location:mensaje_de_envio.html');
    }

    public function attribute()
    {
        return [
            'temp_obra' => 'Temporada de la obra',
            'sector_obra' => 'Sector de la obra',
            'titulo_obra' => 'Titulo de la obra',
            'no_inv_obra' => 'Numero de inventario de la obra',
            'respon_ecro' => 'Responsable de la ECRO',
            'forma_ingreso' => 'Forma de ingreso',
            'proyecto_obra' => 'Proyecto de la obra',
            'tipo_obj_obra' => 'Tipo de objeto de la obra',
            'no_proyec_obra' => 'Numero de proyecto de la obra',
            'caract_descrip' => 'Caracteristicas descriptivas',
            'tipo_bien_cultu' => 'Tipo de bien cultural',
            'lugar_proce_ori' => 'Lugar de procedencia original',
            'lugar_proce_act' => 'Lugar de procedencia actual',
            'año_proyec_obra' => 'Año de proyectod e la obra',
        ];
    }

    public function index(Request $request)
    {

      //Funcion para mandar la consulta de la base de datos a la vista index de obras

        $id = $request->get('busqueda');
        $Obras = Obras::where('titulo_obra','like',"%$id%")->paginate(10);
        return view('obras.index',compact('Obras'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('obras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Funcion para crear en la consulta de la base de datos 
        $request->validate([
            'id',
            'id_de_obras',
            'titulo_obra' => 'required',
            'temp_obra',
            'caract_descrip',
            'año',
            'año_confirm',
            'año_aproxi',
            'cultura',
            'autor',
            'epoca_obra',
            'epoca_confirm',
            'epoca_aproxi',
            'tipo_bien_cultu' => 'required',
            'tipo_obj_obra' => 'required',
            'lugar_proce_ori',
            'lugar_proce_act',
            'no_inv_obra',
            'forma_ingreso'=> 'required',
            'sector_obra' => 'required',
            'respon_ecro' => 'required',
            'proyecto_obra',
            'año_trabajo_obra',
            'no_proyec_obra',
            'temporada_trabajo',
            'fecha_de_entrada' => 'required',
            'fecha_de_salida',
        ]);

        $obra = new Obras;

        $obra->año = $request->input('año');
        $obra->autor = $request->input('autor');
        $obra->cultura = $request->input('cultura');
        $obra->temp_obra = $request->temporalidadotro == NULL ? $request->input('temp_obra') : $request->input('temporalidadotro');
        $obra->año_aproxi = $request->input('año_aproxi');
        $obra->epoca_obra = $request->epocaobraotro === null ? $request->input('epoca_obra') : $request->input('epocaobraotro');
        $obra->id_de_obras = $request->input('id_de_obras');
        $obra->titulo_obra = $request->input('titulo_obra');
        $obra->respon_ecro = $request->input('respon_ecro');
        $obra->no_inv_obra = $request->input('no_inv_obra');
        $obra->sector_obra = $request->sectorobraotro === null ? $request->input('sector_obra') : $request->input('sectorobraotro');
        $obra->año_confirm = $request->input('año_confirm');
        $obra->epoca_aproxi = $request->input('epoca_aproxi');
        $obra->tipo_obj_obra = $request->tipoobjetootro === null ? $request->input('tipo_obj_obra') : $request->input('tipoobjetootro');
        $obra->forma_ingreso = $request->input('forma_ingreso');
        $obra->epoca_confirm = $request->input('epoca_confirm');
        $obra->proyecto_obra = $request->input('proyecto_obra');
        $obra->caract_descrip = $request->input('caract_descrip');
        $obra->no_proyec_obra = $request->input('no_proyec_obra');
        $obra->fecha_de_salida = $request->input('fecha_de_salida');
        $obra->tipo_bien_cultu = $request->tipobotro === null ? $request->input('tipo_bien_cultu') : $request->input('tipobotro');
        $obra->lugar_proce_ori = $request->input('lugar_proce_ori');
        $obra->lugar_proce_act = $request->input('lugar_proce_act');
        //$obra->año_trabajo_obra = $request->input('año_trabajo_obra');
        $obra->fecha_de_entrada = $request->input('fecha_de_entrada');

        if ($obra->save()) {

            for ($counters=0; $counters < 7 ; $counters++) { 
                $obtener_id = Obras::latest('id')->first();
                if ($request->has("temporada_trabajo{$counters}")) {
                    TemporadasTrabajo::create(['obra_id' => $obra->id, 'temporada_trabajo' => $request->get("temporada_trabajo{$counters}")]);
                }else{
                    break;
                }
            }
            
            
            for ($counter = 0; $counter < 7; $counter++) {
                if ($request->has("anio{$counter}")) {
                    AniosTemporada::create(['obra_id' => $obra->id, 'anio_temporada_trabajo' => $request->get("anio{$counter}")]);
                }else{

                break;//This is not the best approach, but will work.
            }
        }
            
        }

        return redirect()->route('Obras.index')->with('success','Obra Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obras  $obras
     */
    public function show($ido)
    {
        //Funcion para mandar la consulta de la base de datos a la vista show de obras
        $obra = DB::table('obras')->where('obras.id', $ido)
        ->leftjoin('anio_temporada', 'obras.id', '=' , 'anio_temporada.obra_id')
        ->select('obras.*', 'anio_temporada.anio_temporada_trabajo')
        ->get();

        $tempo = DB::table('temporada_trabajo')->where('obra_id', $ido)
        ->select('temporada_trabajo.temporada_trabajo')
        ->get();

        $obras = $obra;
        
        //$anio = AniosTemporada::where('obra_id', $obra->id)->join('anio_temporada_trabajo');
        //dd($obras);
        return view('obras.show', compact('obras', 'tempo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obras  $obras
     * @return \Illuminate\Http\Response
     */
    public function edit(Obras $Obras)
    {
        //return view('Obras.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obras  $obras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obras $Obras)
    {
        //Funcion para actualizar en la base de datos 
        $request->validate([
            'id',
            'titulo_obra' => 'required',
            'temp_obra' => 'required',
            'caract_descrip' => 'required',
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
            'fecha_de_entrada' ,
            'fecha_de_salida',

        ]);
        
        
        $Obras->update($request->all());

        

        return redirect()->route('Obras.index')
                        ->with('success','Obras Actualizadas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obras  $obras
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $id)
    {
        /* $Obras = Obras::findOrFail($id->id);
  $Obras->delete();

  return redirect()->route('Obras.index');*/
        // $id->delete();
         /*$Obras = Obras::find($id);


        return redirect()->route('Obras.index')
                        ->with('success','Obra Eliminada.');*/
    }
}
