@extends('adminlte::layouts.app')
 
@section('main-content')

<?php
    $analisisg = $analisisgs->first();
    $contador_soporte = 0;
$contador_base = 0;
$contador_estratigrafia = 0;
$contador_revoque = 0;
$contador_bol = 0;
$contador_laminas = 0;
$contador_pigmentos = 0;
$contador_aglutinante = 0;
$contador_recubrimiento = 0;


?>

<div class="box">
    <div class="box-body"  >
            <div class="panel" align="center">
                <h1>Solicitud de Análisis Científico: {{ $analisisg->id_general }}</h1>
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
                <form action="{{ route('analisisg.actualizar', $analisisg->id_general) }}" method="POST" class="form-inline text-left" enctype="multipart/form-data">
                    @csrf 

                    <div align="center" style="overflow-x: auto;">
                        <table style="width: 50%" border="0">
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos Generales</h3></th>
                            </tr>
                            <tr >
                               <td> <label for="id_de_obra" class="input-group-addon" style="width: 300px; border:0;">ID Obra </label></td>
                               <td> <input type="text" name="id_de_obra" class="form-control"  value="{{ $analisisg->id_de_obra }}" style="width:500px; text-align:center;"  readonly></td>    
                            </tr>
                            <tr >
                               <td> <label for="titulo_obra" class="input-group-addon" style="width: 300px; border:0;">Titulo de la obra/pieza</label></td>
                               <td> <input type="text" name="titulo_obra" class="form-control"  value="{{ $analisisg->titulo_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
							<tr>
                               <td> <span class="input-group-addon"style="width: 300px; border:0;">Temporalidad</span></td>
                               <td> <input type="text" name="temp_obra" class="form-control"  value="{{ $analisisg->temp_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            @if($analisisg->epoca_obra == NULL)
                            @else
                            <tr>
                              <td>  <label for="epoca_obra" class="input-group-addon"style="width: 300px; border:0;">Epoca de la obra</label></td>
                              <td>  <input type="text" name="epoca_obra" class="form-control"  value="{{ $analisisg->epoca_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            @endif
                            @if($analisisg->año_de_obra == NULL)
                        @else
                        <tr>
                            <td><label for="año_de_obra" class="input-group-addon" style="width: 300px;">Año de la Obra</label></td>
                            <td><input type="text" name="año_de_obra" class="form-control"  value="{{$analisisg->año_de_obra }}" style="width:500px; text-align:center;" readonly></td>
                        </tr>
                        @endif
                            <tr>
                              <td>  <label for="tipo_obj_obra" class="input-group-addon"style="width: 300px; border:0;">Tipo de objeto de la obra</label></td>
                               <td> <input type="text" name="tipo_obj_obra" class="form-control"  value="{{$analisisg->tipo_obj_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                               <td> <span class="input-group-addon"style="width: 300px; border:0;">Área de la obra</span></td>
                               <td> <input type="text" name="sector_obra" class="form-control"  value="{{ $analisisg->sector_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                            <td><label for="anio_temporada_trabajo" class="input-group-addon" style="width: 300px;">Año de temporada de trabajo</label></td>
                            <td><input type="text" name="anio_temporada_trabajo" class="form-control"  value="{{$analisisg->anio_temporada_trabajo }}" style="width:500px; text-align:center;" readonly></td>
                        </tr>
                        
                       <tr>
                        <td><label for="respon_intervencion" class="input-group-addon"style="width: 300px; border:0;">Responsable de la Intervención</label></td>
                        <td><input type="text" class="form-control"  name="respon_intervencion"  value="{{ $analisisg->respon_intervencion }}" style="width:500px; text-align:center;"></td>
                      </tr>
                     <tr>
                       <td> <label for="tecnica" class="input-group-addon"style="width: 300px; border:0;">Técnica</label></td>
                        <td><input type="text" class="form-control"  name="tecnica" value="{{ $analisisg->tecnica}}" style="width:500px; text-align:center;"></td>
                     </tr>
                     <tr>
                            <td> <i class="fa fa-calendar"style="width: 300px; border:0;"> Fecha de entrada</i></td>
                           <td><input type="text" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:500px;text-align:center;"></td>
                        </tr>
                 </table>
             </div>
                 <br>
                <div align="left"  style="padding-left: 20%">
                    <table>
                        <tr>
                            <th></th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Alto</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Ancho</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Profundidad</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Diametro</th>
                        </tr>
                        <tr>
                            <th>Dimensiones </th>
                            <td><input type="text" class="form-control" name="alto" value="{{ $analisisg->alto}}" style="width:200px; text-align:center; "></td></td>
                            <td><input type="text" class="form-control" name="ancho" value="{{ $analisisg->ancho}}"style="width:200px; text-align:center; "></td></td>
                            <td><input type="text" class="form-control" name="profundidad" value="{{ $analisisg->profundidad}}"style="width:200px; text-align:center; "></td>
                            <td><input type="text" class="form-control" name="diametro" value="{{ $analisisg->diametro}}"style="width:200px; text-align:center; "></td>
                        </tr>
                    </table>

</div>  <!--aca termina-->
<br>
    <div style="overflow-x: auto;">
                <div class="" align="center" style="overflow-x: auto;">
                    <table style="width: 50%" class="table-bordered">
                        <tr>
                            <th style="text-align: center; background-color: #7C858C; color:white;">Foto de inicio</th>
                            <th style="text-align: center; background-color: #7C858C; color:white;">Esquema de toma de muestra</th>
                        
                        
                    </tr>
                    <tr>
                        <td align="center">
                            @if($analisisg->foto == 'Sin imagen')
                        <input type="text" class="form-control"  name="foto" border="0" value="Sin imagen" style="width:200px">
                        @else
                        <a align="center" target="_blank" href="http://127.0.0.1:8000/images/{{$analisisg->foto}} "><img  width="400px" src="{{asset('images/'.$analisisg->foto)}}" class=""></a>
                        @endif  
                        </td>
                        <td align="center">
                            @if($analisisg->esquema_muestras == 'Sin imagen')
                        <input type="text" class="form-control"  name="esquema_muestras" border="0" value="Sin imagen" style="width:200px">
                        @else
                        <a align="center" target="_blank" href="http://127.0.0.1:8000/images/{{$analisisg->esquema_muestras}} "><img  width="400px" src="{{asset('images/'.$analisisg->esquema_muestras)}}" class=""></a>
                        @endif
                        </td>
                        
                    </tr>
                    </table>  
                    </div>
                    <h2 style="background-color: #7C858C; color:white; text-align:center;">Análisis</h2>
               <!--TABLA SOPORTE  I-->
                @foreach($soportes as $soporte)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" style="width: 50%"><strong>I. SOPORTE</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #C65911; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #C65911; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #C65911; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #C65911; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #C65911; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #C65911; color:white; width:300px">Responsable</th>
                                {{-- Se elimina atributo en solicitud de Geovanna --}}
                                {{-- <th style="background-color: #C65911; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Smuestra" value="{{ $soporte->soporte_muestra}}"></td>
                                <td><input type="text" name="Snomenclatura" value="{{ $soporte->soporte_nomenclatura}}"></td>
                                <td><input type="text" name="Sinf_requerida" value="{{ $soporte->soporte_inf_requerida}}"></td>
                                <td><input type="text" name="Sdes_muestra" value="{{ $soporte->soporte_des_muestra}}"></td>
                                <td><input type="text" name="Subicacion" value="{{ $soporte->soporte_ubicacion}}"></td>
                                <td><input type="text" name="Sresponsable" value="{{ $soporte->soporte_responsable}}"></td>
                                {{-- Se elimina atributo en solicitud de Geovanna --}}
                                {{-- <td><input type="text" name="Siden_muestra" value="{{ $soporte->soporte_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach

                <!--TABLA BASE MUESTRA II -->
               @foreach($baseP as $bases)
               <div class="input-group" id="tabbase" >
                    <table class="table table-bordered" style="width: 50%"><strong>II.BASE DE PREPARACIÓN</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FFCC66; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #FFCC66; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BPmuestra" value="{{ $bases->base_muestra}}"></td>
                                <td><input type="text" name="BPnomenclatura" value="{{ $bases->base_nomenclatura}}"></td>
                                <td><input type="text" name="BPinf_requerida" value="{{ $bases->base_inf_requerida}}"></td>
                                <td><input type="text" name="BPdes_muestra" value="{{ $bases->base_des_muestra}}"></td>
                                <td><input type="text" name="BPubicacion" value="{{ $bases->base_ubicacion}}"></td>
                                <td><input type="text" name="BPresponsable" value="{{ $bases->base_responsable}}"></td>
                                {{-- <td><input type="text" name="BPiden_muestra" value="{{ $bases->base_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach

                <!--ESTATIGRAFIA-->
                @foreach($estratigrafia as $estratigrafias)
               <div class="input-group" id="tabbase" >
                    <table class="table table-bordered" style="width: 50%"><strong>III. ESTRATIGRAFÍA</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #008000; color:white;">Número de muestra</th>
                                <th style="background-color: #008000; color:white;">Nomenclatura</th>
                                <th style="background-color: #008000; color:white;">Información requerida</th>
                                <th style="background-color: #008000; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #008000; color:white;">Ubicación</th>
                                <th style="background-color: #008000; color:white;">Responsable</th>
                                {{-- <th style="background-color: #008000; color:white;">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Emuestra" value="{{ $estratigrafias->estratigrafia_muestra}}"></td>
                                <td><input type="text" name="Enomenclatura" value="{{ $estratigrafias->estratigrafia_nomenclatura}}"></td>
                                <td><input type="text" name="Einf_requerida" value="{{ $estratigrafias->estratigrafia_inf_requerida}}"></td>
                                <td><input type="text" name="Edes_muestra" value="{{ $estratigrafias->estratigrafia_des_muestra}}"></td>
                                <td><input type="text" name="Eubicacion" value="{{ $estratigrafias->estratigrafia_ubicacion}}"></td>
                                <td><input type="text" name="Eresponsable" value="{{ $estratigrafias->estratigrafia_responsable}}"></td>
                                {{-- <td><input type="text" name="Eiden_muestra" value="{{ $estratigrafias->estratigrafia_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach 

                <!--REVOQUE Y ENLUCIDO-->
                @foreach($revoque as $revoques)
               <div class="input-group" id="tabbase" >
                    <table class="table table-bordered" style="width: 50%"><strong>IV. REVOQUE Y ENLUCIDO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #B248A5; color:white;">Número de muestra</th>
                                <th style="background-color: #B248A5; color:white;">Nomenclatura</th>
                                <th style="background-color: #B248A5; color:white;">Información requerida</th>
                                <th style="background-color: #B248A5; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #B248A5; color:white;">Ubicación</th>
                                <th style="background-color: #B248A5; color:white;">Responsable</th>
                                {{-- <th style="background-color: #B248A5; color:white;">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="REmuestra" value="{{ $revoques->revoque_muestra}}"></td>
                                <td><input type="text" name="REnomenclatura" value="{{ $revoques->revoque_nomenclatura}}"></td>
                                <td><input type="text" name="REinf_requerida" value="{{ $revoques->revoque_inf_requerida}}"></td>
                                <td><input type="text" name="REdes_muestra" value="{{ $revoques->revoque_des_muestra}}"></td>
                                <td><input type="text" name="REubicacion" value="{{ $revoques->revoque_ubicacion}}"></td>
                                <td><input type="text" name="REresponsable" value="{{ $revoques->revoque_responsable}}"></td>
                                {{-- <td><input type="text" name="REiden_muestra" value="{{ $revoques->revoque_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach                 

                <!--BOL-->
                @foreach($bol as $bols)
               <div class="input-group" id="tabbol" >
                    <table class="table table-bordered" style="width: 50%"><strong>VI. BOL</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FF5050; color:white;">Número de muestra</th>
                                <th style="background-color: #FF5050; color:white;">Nomenclatura</th>
                                <th style="background-color: #FF5050; color:white;">Información requerida</th>
                                <th style="background-color: #FF5050; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #FF5050; color:white;">Ubicación</th>
                                <th style="background-color: #FF5050; color:white;">Responsable</th>
                                {{-- <th style="background-color: #FF5050; color:white;">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BOLmuestra" value="{{ $bols->bol_muestra}}"></td>
                                <td><input type="text" name="BOLnomenclatura" value="{{ $bols->bol_nomenclatura}}"></td>
                                <td><input type="text" name="BOLinf_requerida" value="{{ $bols->bol_inf_requerida}}"></td>
                                <td><input type="text" name="BOLdes_muestra" value="{{ $bols->bol_des_muestra}}"></td>
                                <td><input type="text" name="BOLubicacion" value="{{ $bols->bol_ubicacion}}"></td>
                                <td><input type="text" name="BOLresponsable" value="{{ $bols->bol_responsable}}"></td>
                                {{-- <td><input type="text" name="BOLiden_muestra" value="{{ $bols->bol_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach    

                <!--LAMINAS METALICAS -->
                 @foreach($lamina as $laminas)
               <div class="input-group" id="tabbol" >
                    <table class="table table-bordered" style="width: 50%"><strong>VII. LÁMINAS METÁLICAS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #3A5754; color:white;">Número de muestra</th>
                                <th style="background-color: #3A5754; color:white;">Nomenclatura</th>
                                <th style="background-color: #3A5754; color:white;">Información requerida</th>
                                <th style="background-color: #3A5754; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #3A5754; color:white;">Ubicación</th>
                                <th style="background-color: #3A5754; color:white;">Responsable</th>
                                {{-- <th style="background-color: #3A5754; color:white;">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="LMmuestra" value="{{ $laminas->laminas_muestra}}"></td>
                                <td><input type="text" name="LMnomenclatura" value="{{ $laminas->laminas_nomenclatura}}"></td>
                                <td><input type="text" name="LMinf_requerida" value="{{ $laminas->laminas_inf_requerida}}"></td>
                                <td><input type="text" name="LMdes_muestra" value="{{ $laminas->laminas_des_muestra}}"></td>
                                <td><input type="text" name="LMubicacion" value="{{ $laminas->laminas_ubicacion}}"></td>
                                <td><input type="text" name="LMresponsable" value="{{ $laminas->laminas_responsable}}"></td>
                                {{-- <td><input type="text" name="LMiden_muestra" value="{{ $laminas->laminas_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach    

                <!-- PIGMENTOS -->
                @foreach($pigmento as $pigmentos)
               <div class="input-group" id="tabbol" >
                    <table class="table table-bordered" style="width: 50%"><strong>VIII.PIGMENTOS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #5B9BD5; color:white;">Número de muestra</th>
                                <th style="background-color: #5B9BD5; color:white;">Nomenclatura</th>
                                <th style="background-color: #5B9BD5; color:white;">Información requerida</th>
                                <th style="background-color: #5B9BD5; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #5B9BD5; color:white;">Ubicación</th>
                                <th style="background-color: #5B9BD5; color:white;">Responsable</th>
                                {{-- <th style="background-color: #5B9BD5; color:white;">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="LMmuestra" value="{{ $pigmentos->pigmentos_muestra}}"></td>
                                <td><input type="text" name="LMnomenclatura" value="{{ $pigmentos->pigmentos_nomenclatura}}"></td>
                                <td><input type="text" name="LMinf_requerida" value="{{ $pigmentos->pigmentos_inf_requerida}}"></td>
                                <td><input type="text" name="LMdes_muestra" value="{{ $pigmentos->pigmentos_des_muestra}}"></td>
                                <td><input type="text" name="LMubicacion" value="{{ $pigmentos->pigmentos_ubicacion}}"></td>
                                <td><input type="text" name="LMresponsable" value="{{ $pigmentos->pigmentos_responsable}}"></td>
                                {{-- <td><input type="text" name="LMiden_muestra" value="{{ $pigmentos->pigmentos_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach

                <!-- AGLUTINANTES -->
                @foreach($aglutinante as $aglutinantes)
               <div class="input-group" id="tabbol" >
                    <table class="table table-bordered" style="width: 50%"><strong>IX.AGLUTINANTES</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #F55587; color:white;">Número de muestra</th>
                                <th style="background-color: #F55587; color:white;">Nomenclatura</th>
                                <th style="background-color: #F55587; color:white;">Información requerida</th>
                                <th style="background-color: #F55587; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #F55587; color:white;">Ubicación</th>
                                <th style="background-color: #F55587; color:white;">Responsable</th>
                                {{-- <th style="background-color: #F55587; color:white;">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Amuestra" value="{{ $aglutinantes->aglutinante_muestra}}"></td>
                                <td><input type="text" name="Anomenclatura" value="{{ $aglutinantes->aglutinante_nomenclatura}}"></td>
                                <td><input type="text" name="Ainf_requerida" value="{{ $aglutinantes->aglutinante_inf_requerida}}"></td>
                                <td><input type="text" name="Ades_muestra" value="{{ $aglutinantes->aglutinante_des_muestra}}"></td>
                                <td><input type="text" name="Aubicacion" value="{{ $aglutinantes->aglutinante_ubicacion}}"></td>
                                <td><input type="text" name="Aresponsable" value="{{ $aglutinantes->aglutinante_responsable}}"></td>
                                {{-- <td><input type="text" name="Aiden_muestra" value="{{ $aglutinantes->aglutinante_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach             

                <!-- RECUBRIMIENTOS -->
                @foreach($recubrimiento as $recubrimientos)
               <div class="input-group" id="tabbol" >
                    <table class="table table-bordered" style="width: 50%"><strong>X. RECUBRIMIENTOS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FBAE47; color:white;">Número de muestra</th>
                                <th style="background-color: #FBAE47; color:white;">Nomenclatura</th>
                                <th style="background-color: #FBAE47; color:white;">Información requerida</th>
                                <th style="background-color: #FBAE47; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #FBAE47; color:white;">Ubicación</th>
                                <th style="background-color: #FBAE47; color:white;">Responsable</th>
                                {{-- <th style="background-color: #FBAE47; color:white;">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="Rmuestra" value="{{ $recubrimientos->recubrimiento_muestra}}"></td>
                                <td><input type="text" name="Rnomenclatura" value="{{ $recubrimientos->recubrimiento_nomenclatura}}"></td>
                                <td><input type="text" name="Rinf_requerida" value="{{ $recubrimientos->recubrimiento_inf_requerida}}"></td>
                                <td><input type="text" name="Rdes_muestra" value="{{ $recubrimientos->recubrimiento_des_muestra}}"></td>
                                <td><input type="text" name="Rubicacion" value="{{ $recubrimientos->recubrimiento_ubicacion}}"></td>
                                <td><input type="text" name="Rresponsable" value="{{ $recubrimientos->recubrimiento_responsable}}"></td>
                                {{-- <td><input type="text" name="Riden_muestra" value="{{ $recubrimientos->recubrimiento_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
                

                <!--MATERIAL ASOCIADO XI -->
                @foreach($maso as $materialaso)
               <div class="input-group" id="tabmaterialaso" >
                    <table class="table table-bordered" style="width: 50%"><strong>XI. MATERIAL ASOCIADO </strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #009999; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #009999; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #009999; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #009999; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MASOmuestra" value="{{ $materialaso->materialaso_muestra}}"></td>
                                <td><input type="text" name="MASOnomenclatura" value="{{ $materialaso->materialaso_nomenclatura}}"></td>
                                <td><input type="text" name="MASOinf_requerida" value="{{ $materialaso->materialaso_inf_requerida}}"></td>
                                <td><input type="text" name="MASOdes_muestra" value="{{ $materialaso->materialaso_des_muestra}}"></td>
                                <td><input type="text" name="MASOubicacion" value="{{ $materialaso->materialaso_ubicacion}}"></td>
                                <td><input type="text" name="MASOresponsable" value="{{ $materialaso->materialaso_responsable}}"></td>
                                {{-- <td><input type="text" name="MASOiden_muestra" value="{{ $materialaso->materialaso_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach


                <!--SALES XII -->
                @foreach($sal as $sales)
               <div class="input-group" id="tabsales" >
                    <table class="table table-bordered" style="width: 50%"><strong>XII. SALES </strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #009999; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #009999; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #009999; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #009999; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="SALmuestra" value="{{ $sales->sales_muestra}}"></td>
                                <td><input type="text" name="SALnomenclatura" value="{{ $sales->sales_nomenclatura}}"></td>
                                <td><input type="text" name="SALinf_requerida" value="{{ $sales->sales_inf_requerida}}"></td>
                                <td><input type="text" name="SALdes_muestra" value="{{ $sales->sales_des_muestra}}"></td>
                                <td><input type="text" name="SALubicacion" value="{{ $sales->sales_ubicacion}}"></td>
                                <td><input type="text" name="SALresponsable" value="{{ $sales->sales_responsable}}"></td>
                                {{-- <td><input type="text" name="SALiden_muestra" value="{{ $sales->sales_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach


                
                <!--MATERIAL AGREGADO XIII -->
                @foreach($materialag as $matag)
               <div class="input-group" id="tabmaterialag" >
                    <table class="table table-bordered" style="width: 50%"><strong>XIII. MATERIAL AGREGADO </strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #7D10C0; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #7D10C0; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MAGmuestra" value="{{ $matag->materialag_muestra}}"></td>
                                <td><input type="text" name="MAGnomenclatura" value="{{ $matag->materialag_nomenclatura}}"></td>
                                <td><input type="text" name="MAGinf_requerida" value="{{ $matag->materialag_inf_requerida}}"></td>
                                <td><input type="text" name="MAGdes_muestra" value="{{ $matag->materialag_des_muestra}}"></td>
                                <td><input type="text" name="MAGubicacion" value="{{ $matag->materialag_ubicacion}}"></td>
                                <td><input type="text" name="MAGresponsable" value="{{ $matag->materialag_responsable}}"></td>
                                {{-- <td><input type="text" name="MAGiden_muestra" value="{{ $matag->materialag_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach



                <!--TABLA BIODETERIORO XIV -->
                @foreach($biodeterioro as $biodeterioros)
               <div class="input-group" id="tabbiodeterioro" >
                    <table class="table table-bordered" style="width: 50%"><strong>XIV. BIODETERIORO </strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A2C866; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #A2C866; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BDTmuestra" value="{{ $biodeterioros->biodeterioro_muestra}}"></td>
                                <td><input type="text" name="BDTnomenclatura" value="{{ $biodeterioros->biodeterioro_nomenclatura}}"></td>
                                <td><input type="text" name="BDTinf_requerida" value="{{ $biodeterioros->biodeterioro_inf_requerida}}"></td>
                                <td><input type="text" name="BDTdes_muestra" value="{{ $biodeterioros->biodeterioro_des_muestra}}"></td>
                                <td><input type="text" name="BDTubicacion" value="{{ $biodeterioros->biodeterioro_ubicacion}}"></td>
                                <td><input type="text" name="BDTresponsable" value="{{ $biodeterioros->biodeterioro_responsable}}"></td>
                                {{-- <td><input type="text" name="BDTiden_muestra" value="{{ $biodeterioros->biodeterioro_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach





                <!--TABLA OTROS XV -->
                @foreach($otros as $otro)
               <div class="input-group" id="tabbase" >
                    <table class="table table-bordered" style="width: 50%"><strong>XV. OTROS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Número de muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Nomenclatura</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Información requerida</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Descripcion de la muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Ubicación</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px" >Responsable</th>
                                {{-- <th style="background-color: #A5A5A5; color:white; width:300px" >No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="OTmuestra" value="{{ $otro->otros_muestra}}"></td>
                                <td><input type="text" name="OTnomenclatura" value="{{ $otro->otros_nomenclatura}}"></td>
                                <td><input type="text" name="OTinf_requerida" value="{{ $otro->otros_inf_requerida}}"></td>
                                <td><input type="text" name="OTdes_muestra" value="{{ $otro->otros_des_muestra}}"></td>
                                <td><input type="text" name="OTubicacion" value="{{ $otro->otros_ubicacion}}"></td>
                                <td><input type="text" name="OTresponsable" value="{{ $otro->otros_responsable}}"></td>
                                {{-- <td><input type="text" name="OTiden_muestra" value="{{ $otro->otros_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
                <br><br>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <a href="{{route('analisisg.index')}}" class="btn btn-danger btn-sm">Regresar</a>
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection