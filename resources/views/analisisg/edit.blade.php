@extends('adminlte::layouts.app')
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
$contador_otros = 0;
$contador_biodeterioro = 0;
$contador_matag = 0;
$contador_sales = 0;
$contador_maso = 0;
?>

@section('main-content')

<!--@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>{{ $Obrasg->first()->id }}
@endif-->
<div class="box">
    <div class="box-body"  >
            <div class="panel" style="overflow-x: auto;">
                <h1 style=" text-align:center;"> Solicitud de Análisis Científico </h1>


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
                    @method('put')
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
                        <td>Esquema de toma de muestra</td>
                        <td><input type="file" class="form-control date" name="esquema_muestras" placeholder="{{ $analisisg->esquema_muestras }}"  style="width:500px;text-align:center;"></td>
                    </tr>
                     <tr>
                            <td> <i class="fa fa-calendar"style="width: 300px; border:0;"> Fecha de inicio de intervención</i></td>
                           <td><input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:500px;text-align:center;"></td>
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

</div>
<h2 style="background-color: #7C858C; color:white; text-align:center;">Análisis</h2>
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
                                <td><input type="text" name="Smuestra_edit{{$contador_soporte}}" value="{{ $soporte->soporte_muestra}}"></td>
                                <td><input type="text" name="Snomenclatura_edit{{$contador_soporte}}" value="{{ $soporte->soporte_nomenclatura}}"></td>
                                <td><input type="text" name="Sinf_requerida_edit{{$contador_soporte}}" value="{{ $soporte->soporte_inf_requerida}}"></td>
                                <td><input type="text" name="Sdes_muestra_edit{{$contador_soporte}}" value="{{ $soporte->soporte_des_muestra}}"></td>
                                <td><input type="text" name="Subicacion_edit{{$contador_soporte}}" value="{{ $soporte->soporte_ubicacion}}"></td>
                                <td><input type="text" name="Sresponsable_edit{{$contador_soporte}}" value="{{ $soporte->soporte_responsable}}"></td>
                                {{-- Se elimina atributo en solicitud de Geovanna --}}
                                {{-- <td><input type="text" name="Siden_muestra_edit{{$contador_soporte}}" value="{{ $soporte->soporte_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    </div>
                <?php
                    $contador_soporte +=1;
                  ?>  
               @endforeach
               @if($soportes->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrosoporte" name="otrosoporte" class="btn-sm"  value="Agregar más" onclick="javascript:massoporte()">
                </div>
                <div id="inputsoporte"></div><br>
                @endif

            
            <!--BASE DE PREPARACION II-->
               @foreach($baseP as $basesP)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" style="width: 50%"><strong>II. BASE DE PREPARACIÓN</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FFCC66; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #FFCC66; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BPmuestra_edit{{$contador_base}}" value="{{ $basesP->base_muestra}}"></td>
                                <td><input type="text" name="BPnomenclatura_edit{{$contador_base}}" value="{{ $basesP->base_nomenclatura}}"></td>
                                <td><input type="text" name="BPinf_requerida_edit{{$contador_base}}" value="{{ $basesP->base_inf_requerida}}"></td>
                                <td><input type="text" name="BPdes_muestra_edit{{$contador_base}}" value="{{ $basesP->base_des_muestra}}"></td>
                                <td><input type="text" name="BPubicacion_edit{{$contador_base}}" value="{{ $basesP->base_ubicacion}}"></td>
                                <td><input type="text" name="BPresponsable_edit{{$contador_base}}" value="{{ $basesP->base_responsable}}"></td>
                                {{-- <td><input type="text" name="BPiden_muestra_edit{{$contador_base}}" value="{{ $basesP->base_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_base +=1;
                  ?>
               @endforeach
               @if($baseP->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrobase" name="otrobase" class="btn-sm"  value="Agregar más" onclick="javascript:masbase()">
                </div>
                <div id="inputbase"></div><br>
                @endif

                <!--ESTATIGRAFIA III-->
                @foreach($estratigrafia as $estratigrafias)
                <div class="input-group" id="tabso" >
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
                                <td><input type="text" name="Emuestra_edit{{$contador_estratigrafia}}" value="{{ $estratigrafias->estratigrafia_muestra}}"></td>
                                <td><input type="text" name="Enomenclatura_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_nomenclatura}}"></td>
                                <td><input type="text" name="Einf_requerida_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_inf_requerida}}"></td>
                                <td><input type="text" name="Edes_muestra_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_des_muestra}}"></td>
                                <td><input type="text" name="Eubicacion_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_ubicacion}}"></td>
                                <td><input type="text" name="Eresponsable_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_responsable}}"></td>
                                {{-- <td><input type="text" name="Eiden_muestra_edit{{$contador_estratigrafia}}" value="{{$estratigrafias->estratigrafia_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_estratigrafia +=1;
                  ?>
               @endforeach
               @if($estratigrafia->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrobase" name="otrobase" class="btn-sm"  value="Agregar más" onclick="javascript:masestratigrafia()">
                </div>
                <div id="inputestratigrafia"></div><br>
                @endif


                <!--REVOQUE Y ENLUCIDO IV-->
                @foreach($revoque as $revoques)
                <div class="input-group" id="tabso" >
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
                                <td><input type="text" name="REmuestra_edit{{$contador_revoque}}" value="{{ $revoques->revoque_muestra}}"></td>
                                <td><input type="text" name="REnomenclatura_edit{{$contador_revoque}}" value="{{$revoques->revoque_nomenclatura}}"></td>
                                <td><input type="text" name="REinf_requerida_edit{{$contador_revoque}}" value="{{$revoques->revoque_inf_requerida}}"></td>
                                <td><input type="text" name="REdes_muestra_edit{{$contador_revoque}}" value="{{$revoques->revoque_des_muestra}}"></td>
                                <td><input type="text" name="REubicacion_edit{{$contador_revoque}}" value="{{$revoques->revoque_ubicacion}}"></td>
                                <td><input type="text" name="REresponsable_edit{{$contador_revoque}}" value="{{$revoques->revoque_responsable}}"></td>
                                {{-- <td><input type="text" name="REiden_muestra_edit{{$contador_revoque}}" value="{{$revoques->revoque_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_revoque +=1;
                  ?>
               @endforeach
               @if($revoque->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrorevoque" name="otrorevoque" class="btn-sm"  value="Agregar más" onclick="javascript:masrevoque()">
                </div>
                <div id="inputrevoque"></div><br>
                @endif


                <!--BOL VI-->
                @foreach($bol as $bols)
                <div class="input-group" id="tabso" >
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
                                <td><input type="text" name="BOLmuestra_edit{{$contador_bol}}" value="{{ $bols->bol_muestra}}"></td>
                                <td><input type="text" name="BOLnomenclatura_edit{{$contador_bol}}" value="{{$bols->bol_nomenclatura}}"></td>
                                <td><input type="text" name="BOLinf_requerida_edit{{$contador_bol}}" value="{{$bols->bol_inf_requerida}}"></td>
                                <td><input type="text" name="BOLdes_muestra_edit{{$contador_bol}}" value="{{$bols->bol_des_muestra}}"></td>
                                <td><input type="text" name="BOLubicacion_edit{{$contador_bol}}" value="{{$bols->bol_ubicacion}}"></td>
                                <td><input type="text" name="BOLresponsable_edit{{$contador_bol}}" value="{{$bols->bol_responsable}}"></td>
                                {{-- <td><input type="text" name="BOLiden_muestra_edit{{$contador_bol}}" value="{{$bols->bol_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_bol +=1;
                  ?>
               @endforeach
               @if($bol->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrobol" name="otrobol" class="btn-sm"  value="Agregar más" onclick="javascript:masbol()">
                </div>
                <div id="inputbol"></div><br>
                @endif

                <!--LAMINAS METALICAS VII-->
                @foreach($lamina as $laminas)
                <div class="input-group" id="tabso" >
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
                                <td><input type="text" name="LMmuestra_edit{{$contador_laminas}}" value="{{ $laminas->laminas_muestra}}"></td>
                                <td><input type="text" name="LMnomenclatura_edit{{$contador_laminas}}" value="{{$laminas->laminas_nomenclatura}}"></td>
                                <td><input type="text" name="LMinf_requerida_edit{{$contador_laminas}}" value="{{$laminas->laminas_inf_requerida}}"></td>
                                <td><input type="text" name="LMdes_muestra_edit{{$contador_laminas}}" value="{{$laminas->laminas_des_muestra}}"></td>
                                <td><input type="text" name="LMubicacion_edit{{$contador_laminas}}" value="{{$laminas->laminas_ubicacion}}"></td>
                                <td><input type="text" name="LMresponsable_edit{{$contador_laminas}}" value="{{$laminas->laminas_responsable}}"></td>
                                {{-- <td><input type="text" name="LMiden_muestra_edit{{$contador_laminas}}" value="{{$laminas->laminas_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_laminas +=1;
                  ?>
               @endforeach
               @if($lamina->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrolaminas" name="otrolaminas" class="btn-sm"  value="Agregar más" onclick="javascript:maslaminas()">
                </div>
                <div id="inputlaminas"></div><br>
                @endif


                <!--PIGMENTOS VIII-->
                @foreach($pigmento as $pigmentos)
                <div class="input-group" id="tabso" >
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
                                <td><input type="text" name="Pmuestra_edit{{$contador_pigmentos}}" value="{{ $pigmentos->pigmentos_muestra}}"></td>
                                <td><input type="text" name="Pnomenclatura_edit{{$contador_pigmentos}}" value="{{$pigmentos->pigmentos_nomenclatura}}"></td>
                                <td><input type="text" name="Pinf_requerida_edit{{$contador_pigmentos}}" value="{{$pigmentos->pigmentos_inf_requerida}}"></td>
                                <td><input type="text" name="Pdes_muestra_edit{{$contador_pigmentos}}" value="{{$pigmentos->pigmentos_des_muestra}}"></td>
                                <td><input type="text" name="Pubicacion_edit{{$contador_pigmentos}}" value="{{$pigmentos->pigmentos_ubicacion}}"></td>
                                <td><input type="text" name="Presponsable_edit{{$contador_pigmentos}}" value="{{$pigmentos->pigmentos_responsable}}"></td>
                                {{-- <td><input type="text" name="Piden_muestra_edit{{$contador_pigmentos}}" value="{{$pigmentos->pigmentos_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_pigmentos +=1;
                  ?>
               @endforeach
               @if($pigmento->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otropigmentos" name="otropigmentos" class="btn-sm"  value="Agregar más" onclick="javascript:maspigmentos()">
                </div>
                <div id="inputpigmentos"></div><br>
                @endif


                <!--AGLUTINANTES IX-->
                @foreach($aglutinante as $aglutinantes)
                <div class="input-group" id="tabso" >
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
                                <td><input type="text" name="Amuestra_edit{{$contador_aglutinante}}" value="{{ $aglutinantes->aglutinante_muestra}}"></td>
                                <td><input type="text" name="Anomenclatura_edit{{$contador_aglutinante}}" value="{{$aglutinantes->aglutinante_nomenclatura}}"></td>
                                <td><input type="text" name="Ainf_requerida_edit{{$contador_aglutinante}}" value="{{$aglutinantes->aglutinante_inf_requerida}}"></td>
                                <td><input type="text" name="Ades_muestra_edit{{$contador_aglutinante}}" value="{{$aglutinantes->aglutinante_des_muestra}}"></td>
                                <td><input type="text" name="Aubicacion_edit{{$contador_aglutinante}}" value="{{$aglutinantes->aglutinante_ubicacion}}"></td>
                                <td><input type="text" name="Aresponsable_edit{{$contador_aglutinante}}" value="{{$aglutinantes->aglutinante_responsable}}"></td>
                                {{-- <td><input type="text" name="Aiden_muestra_edit{{$contador_aglutinante}}" value="{{$aglutinantes->aglutinante_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_aglutinante +=1;
                  ?>
               @endforeach
               @if($aglutinante->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otroaglutinante" name="otroaglutinante" class="btn-sm"  value="Agregar más" onclick="javascript:masaglutinante()">
                </div>
                <div id="inputaglutinante"></div><br>
                @endif

                <!--RECUBRIMIENTOS X-->
                @foreach($recubrimiento as $recubrimientos)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" style="width: 50%"><strong>X.RECUBRIMIENTOS</strong> 
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
                                <td><input type="text" name="Rmuestra_edit{{$contador_recubrimiento}}" value="{{ $recubrimientos->recubrimiento_muestra}}"></td>
                                <td><input type="text" name="Rnomenclatura_edit{{$contador_recubrimiento}}" value="{{$recubrimientos->recubrimiento_nomenclatura}}"></td>
                                <td><input type="text" name="Rinf_requerida_edit{{$contador_recubrimiento}}" value="{{$recubrimientos->recubrimiento_inf_requerida}}"></td>
                                <td><input type="text" name="Rdes_muestra_edit{{$contador_recubrimiento}}" value="{{$recubrimientos->recubrimiento_des_muestra}}"></td>
                                <td><input type="text" name="Rubicacion_edit{{$contador_recubrimiento}}" value="{{$recubrimientos->recubrimiento_ubicacion}}"></td>
                                <td><input type="text" name="Rresponsable_edit{{$contador_recubrimiento}}" value="{{$recubrimientos->recubrimiento_responsable}}"></td>
                                {{-- <td><input type="text" name="Riden_muestra_edit{{$contador_recubrimiento}}" value="{{$recubrimientos->recubrimiento_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_recubrimiento +=1;
                  ?>
               @endforeach
               @if($recubrimiento->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrorecubrimiento" name="otrorecubrimiento" class="btn-sm"  value="Agregar más" onclick="javascript:masrecubrimiento()">
                </div>
                <div id="inputrecubrimiento"></div><br>
                @endif

                
                <!--MATERIALES ASOCIADOS XI-->
                @foreach($maso as $materialaso)
                <div class="input-group" id="tabmaso" >
                    <table class="table table-bordered" style="width: 50%"><strong>XI. MATERIAL ASOCIADO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #8686C4; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #8686C4; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MASOmuestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_muestra}}"></td>
                                <td><input type="text" name="MASOnomenclatura_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_nomenclatura}}"></td>
                                <td><input type="text" name="MASOinf_requerida_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_inf_requerida}}"></td>
                                <td><input type="text" name="MASOdes_muestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_des_muestra}}"></td>
                                <td><input type="text" name="MASOubicacion_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_ubicacion}}"></td>
                                <td><input type="text" name="MASOresponsable_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_responsable}}"></td>
                                {{-- <td><input type="text" name="MASOiden_muestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_maso +=1;
                  ?>
               @endforeach
               @if($maso->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otromaso" name="otromaso" class="btn-sm"  value="Agregar más" onclick="javascript:masmaso()">
                </div>
                <div id="inputmaso"></div><br>
                @endif


                 <!--SALES XII-->
                 @foreach($sal as $sales)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" style="width: 50%"><strong>XII. SALES</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #009999; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #009999; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #009999; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="SALmuestra_edit{{$contador_sales}}" value="{{ $sales->sales_muestra}}"></td>
                                <td><input type="text" name="SALnomenclatura_edit{{$contador_sales}}" value="{{ $sales->sales_nomenclatura}}"></td>
                                <td><input type="text" name="SALinf_requerida_edit{{$contador_sales}}" value="{{ $sales->sales_inf_requerida}}"></td>
                                <td><input type="text" name="SALdes_muestra_edit{{$contador_sales}}" value="{{ $sales->sales_des_muestra}}"></td>
                                <td><input type="text" name="SALubicacion_edit{{$contador_sales}}" value="{{ $sales->sales_ubicacion}}"></td>
                                <td><input type="text" name="SALresponsable_edit{{$contador_sales}}" value="{{ $sales->sales_responsable}}"></td>
                                {{-- <td><input type="text" name="SALiden_muestra_edit{{$contador_sales}}" value="{{ $sales->sales_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_sales +=1;
                  ?>
               @endforeach
               @if($sal->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrosales" name="otrosales" class="btn-sm"  value="Agregar más" onclick="javascript:massales()">
                </div>
                <div id="inputsales"></div><br>
                @endif


                <!--MATERIAL AGREGADO XIII-->
                @foreach($materialag as $matag)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" style="width: 50%"><strong>XIII. MATERIAL AGREGADO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #7D10C0; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #7D10C0; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MAGmuestra_edit{{$contador_matag}}" value="{{ $matag->materialag_muestra}}"></td>
                                <td><input type="text" name="MAGnomenclatura_edit{{$contador_matag}}" value="{{ $matag->materialag_nomenclatura}}"></td>
                                <td><input type="text" name="MAGinf_requerida_edit{{$contador_matag}}" value="{{ $matag->materialag_inf_requerida}}"></td>
                                <td><input type="text" name="MAGdes_muestra_edit{{$contador_matag}}" value="{{ $matag->materialag_des_muestra}}"></td>
                                <td><input type="text" name="MAGubicacion_edit{{$contador_matag}}" value="{{ $matag->materialag_ubicacion}}"></td>
                                <td><input type="text" name="MAGresponsable_edit{{$contador_matag}}" value="{{ $matag->materialag_responsable}}"></td>
                                {{-- <td><input type="text" name="MAGiden_muestra_edit{{$contador_matag}}" value="{{ $matag->materialag_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_matag +=1;
                  ?>
               @endforeach
               @if($materialag->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otromatag" name="otromatag" class="btn-sm"  value="Agregar más" onclick="javascript:masmatag()">
                </div>
                <div id="inputmaterialag"></div><br>
                @endif


            <!--BIODETERIORO MUESTRA XIV-->
                @foreach($biodeterioro as $biodeterioros)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" style="width: 50%"><strong>XIV. BIODETERIORO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A2C866; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #A2C866; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="BDTmuestra_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_muestra}}"></td>
                                <td><input type="text" name="BDTnomenclatura_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_nomenclatura}}"></td>
                                <td><input type="text" name="BDTinf_requerida_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_inf_requerida}}"></td>
                                <td><input type="text" name="BDTdes_muestra_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_des_muestra}}"></td>
                                <td><input type="text" name="BDTubicacion_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_ubicacion}}"></td>
                                <td><input type="text" name="BDTresponsable_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_responsable}}"></td>
                                {{-- <td><input type="text" name="BDTiden_muestra_edit{{$contador_biodeterioro}}" value="{{ $biodeterioros->biodeterioro_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_biodeterioro +=1;
                  ?>
               @endforeach
               @if($biodeterioro->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrobiodeterioro" name="otrobiodeterioro" class="btn-sm"  value="Agregar más" onclick="javascript:masbio()">
                </div>
                <div id="inputbiodeterioro"></div><br>
                @endif





                <!--OTROS MUESTRA XV-->
                @foreach($otros as $otro)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" style="width: 50%"><strong>XV. OTROS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A5A5A5; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #A5A5A5; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="OTmuestra_edit{{$contador_otros}}" value="{{ $otro->otros_muestra}}"></td>
                                <td><input type="text" name="OTnomenclatura_edit{{$contador_otros}}" value="{{ $otro->otros_nomenclatura}}"></td>
                                <td><input type="text" name="OTinf_requerida_edit{{$contador_otros}}" value="{{ $otro->otros_inf_requerida}}"></td>
                                <td><input type="text" name="OTdes_muestra_edit{{$contador_otros}}" value="{{ $otro->otros_des_muestra}}"></td>
                                <td><input type="text" name="OTubicacion_edit{{$contador_otros}}" value="{{ $otro->otros_ubicacion}}"></td>
                                <td><input type="text" name="OTresponsable_edit{{$contador_otros}}" value="{{ $otro->otros_responsable}}"></td>
                                {{-- <td><input type="text" name="OTiden_muestra_edit{{$contador_otros}}" value="{{ $otro->otros_identificacion_muestra}}"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_otros +=1;
                ?>  
               @endforeach
               @if($otros->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otrootros" name="otrootros" class="btn-sm"  value="Agregar más" onclick="javascript:masotros()">
                </div>
                <div id="inputotros"></div><br>
                @endif

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                            <a href="{{route('analisisg.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection