@extends('adminlte::layouts.app')
 
@section('main-content')

<!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>{{ $Obrasg->first()->id }}
@endif-->
<div class="box">
    <div class="box-body"  >
            <div class="panel" align="center">
                <h1>Registro de Análisis Científico</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Vaya!</strong> Algo salio mal.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('registro.actualizar', $a_cientifico->idcientifico) }}" method="POST" class="form-inline text-left" enctype="multipart/form-data">
                    @csrf 
                    <input hidden="" type="text" name="id_gene" value="{{ $a_cientifico->id_gene }}">
                    <div align="center">
                        <table style="width: 50%;"  border="0">
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos Generales</h3></th></tr>
                            <tr>
                                <td><label for="id_obras" class="input-group-addon" style="width: 400px">ID Obra </label></td>
                                <td><input type="text" name="id_obras" class="form-control"  value="{{ $a_cientifico->id_obras }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label class="input-group-addon">Titulo de la obra/pieza</label></td>
                                <td><input type="text" name="titulo_Obra" class="form-control"  value="{{ $a_cientifico->titulo_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label class="input-group-addon">Temporada de trabajo</label></td>
                                <td><input type="text" name="anio_temporada" class="form-control" value="{{$a_cientifico->temporada_trabajo}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                             @if($a_cientifico->epoca_obra == NULL)
                            @else
                            <tr>    
                                <td><label for="epoca" class="input-group-addon">Epoca de la obra</label></td>
                                <td><input type="text" name="epoca" class="form-control" value="{{ $a_cientifico->epoca_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            @endif
                            <tr>
                                <td><label class="input-group-addon">Año de latemporada de trabajo</label></td>
                                <td><input type="text" class="form-control"  name="anio_temporada"  value="{{$a_cientifico->anio_temporada}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;"><i class="fa fa-calendar"> Fecha de inicio</i></td>
                                <td><input type="date" class="form-control date" name="fecha_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $a_cientifico->fecha_inicio }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="tecnica" class="input-group-addon">Técnica</label></td>
                                <td><input type="text" class="form-control"  name="tecnica" value="{{ $a_cientifico->tecnica }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos de Intentificación de la Muestra</h3></th>
                            </tr>
                            <tr>
                            <tr>
                                <td><label for="nomenclatura_muestra" class="input-group-addon">Nomenclatura de la muestra</label></td>
                                <td><input type="text" class="form-control"  name="nomenclatura_muestra" value="{{$a_cientifico->nomenclatura_muestra}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="lugar_de_resguardo" class="input-group-addon">Lugar de Resguardo</label></td>
                                <td><input type="text" class="form-control"  name="lugar_de_resguardo" value="{{$a_cientifico->lugar_de_resguardo}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="caracte_analisis" class="input-group-addon">Caracterización de análisis</label></td>
                                <td><input type="text" class="form-control"  name="caracte_analisis" value="{{$a_cientifico->caracte_analisis}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;"><i class="fa fa-calendar" > Fecha de análisis cientificos</i></td>
                                <td><input type="date" class="form-control date" name="fecha_analisis_cientifico" value="{{$a_cientifico->fecha_analisis_cientifico}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="profesor_responsable" class="input-group-addon">Profesor responsable</label></td>
                                <td><input type="text" class="form-control"  name="profesor_responsable" value="{{$a_cientifico->profesor_responsable}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="persona_realizo_analisis" class="input-group-addon">Persona que realizo el análisis</label></td>
                                <td><input type="text" class="form-control"  name="persona_realizo_analisis" value="{{$a_cientifico->persona_realizo_analisis}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="forma_obtencion_muestra" class="input-group-addon">Forma de obtención de las muestras</label></td>
                                <td><input type="text" class="form-control"  name="forma_obtencion_muestra" value="{{$a_cientifico->forma_obtencion_muestra}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="indicaciones" class="input-group-addon">Indicaciones</label></td>
                                <td><input type="text" class="form-control"  name="indicaciones" value="{{$a_cientifico->indicaciones}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="tipo_material" class="input-group-addon">Tipo de material</label></td>
                                <td><input type="text" class="form-control"  name="tipo_material" value="{{$a_cientifico->tipo_material}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="descripcion" class="input-group-addon">Descripción</label></td>
                                <td><input type="text" class="form-control"  name="descripcion" value="{{$a_cientifico->descripcion}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="info_definir" class="input-group-addon">Información por definir</label></td>
                                <td><input type="text" class="form-control"  name="info_definir" value="{{$a_cientifico->info_definir}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos Analíticos</h3></th>
                            </tr>
                            <tr>
                                <td><label for="analisis_microestructural" class="input-group-addon">Análisis Morfológico</label></td>
                                <td><input type="text" class="form-control"  name="analisis_morfologico" value="{{$a_cientifico->analisis_morfologico}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_microquimico" class="input-group-addon">Análisis microquímico</label></td>
                                <td><input type="text" class="form-control"  name="analisis_microquimico" value="{{$a_cientifico->analisis_microquimico}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_elemental" class="input-group-addon">Análisis microelemental</label></td>
                                <td><input type="text" class="form-control"  name="analisis_elemental" value="{{$a_cientifico->analisis_elemental}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_molecular" class="input-group-addon">Análisis molecular</label></td>
                                <td><input type="text" class="form-control"  name="analisis_molecular" value="{{$a_cientifico->analisis_molecular}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_de_tincion" class="input-group-addon">Análisis de tinción</label></td>
                                <td><input type="text" class="form-control"  name="analisis_de_tincion" value="{{$a_cientifico->analisis_de_tincion}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_microbiologicos" class="input-group-addon">Análisis Microbiológicos</label></td>
                                <td><input type="text" class="form-control"  name="analisis_microbiologicos" value="{{$a_cientifico->analisis_microbiologicos}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="otros" class="input-group-addon">Otros</label></td>
                                <td><input type="text" class="form-control"  name="otros" value="{{$a_cientifico->otros}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Resultados</h3></th>
                            </tr>
                            <tr>
                                <td><label for="resultado_conclucion_general" class="input-group-addon">Conclusión General</label></td>
                                <td><input type="text" class="form-control"  name="resultado_conclucion_general" value="{{$a_cientifico->resultado_conclucion_general}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="interpretacion_particular" class="input-group-addon">Interpretación Particular</label></td>
                                <td><input type="text" class="form-control"  name="interpretacion_particular" value="{{$a_cientifico->interpretacion_particular}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                        </table>
                    </div> 
                    <br>
                    <div class="" align="center">
                    <table style="width: 50%" class="table-bordered">
                        <tr>
                            <th style="text-align: center; background-color: #7C858C; color:white;">Esquema</th>
                            <th style="text-align: center; background-color: #7C858C; color:white;">Microfotografia</th>
                        
                        
                    </tr>
                    <tr>
                        <td align="center">
                            @if($a_cientifico->esquema == 'Sin imagen')
                        <input type="text" class="form-control"  name="esquema" border="0" value="Sin imagen" style="width:200px">
                        @else
                        <a align="center" target="_blank" href="http://127.0.0.1:8000/images/{{$a_cientifico->esquema}} "><img  width="400px" src="{{asset('images/'.$a_cientifico->esquema)}}" class=""></a>
                        @endif  
                        </td>
                        <td align="center">
                            @if($a_cientifico->microfotografia == 'Sin imagen')
                        <input type="text" class="form-control"  name="microfotografia" border="0" value="Sin imagen" style="width:200px">
                        @else
                        <a align="center" target="_blank" href="http://127.0.0.1:8000/images/{{$a_cientifico->microfotografia}} "><img  width="400px" src="{{asset('images/'.$a_cientifico->microfotografia)}}" class=""></a>
                        @endif
                        </td>
                        
                    </tr>
                    </table>  
                    </div>
                    <br>
                    <div class="col-md-12 text-center">
                            <a href="{{route('registro.index')}}" class="btn btn-danger btn-sm">Regresar</a>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection