<style> p.saltodepagina
 {
 page-break-after: always;
 }
 </style>
 <img  align="left" width="200px" src="images/Logotipo_ECRO_Gris.png" >
<div class="box">
    <div class="box-body"  >
    
            <div class="panel" >
             <h1 style=" text-align:center;">Solicitud de Análisis Científico</h1>
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

                    <div  align="center" >
                        <table "width: 100%" border="0" align="center" cellspacing="4" cellpadding="4">
                            <tr>
                                <th colspan="4" style="text-align:center; background-color: #7C858C; color:white; font-size:30px; " ><h3>Datos Generales</h3></th>
                            </tr>
                           
                            <tr >
                               <td> <label for="id_de_obra" class="input-group-addon" style="width: 300px; font-size:20px; border:0;">ID Obra </label></td>
                               <td style=" font-size:20px; text-align:center;">  {{ $analisisg->id_de_obra }} </td>    
                            </tr>
                            <tr >
                               <td> <label for="titulo_obra" class="input-group-addon" style="width: 300px; font-size:20px; border:0;">Titulo de la obra/pieza</label></td>
                               <td style=" font-size:20px; text-align:center;">{{ $analisisg->titulo_obra }}</td>
                            </tr>
							<tr>
                               <td> <span class="input-group-addon"style="width: 300px; font-size:20px; border:0;">Temporalidad</span></td>
                               <td style=" font-size:20px; text-align:center;">{{ $analisisg->temp_obra }}</td>
                            </tr>
                            @if($analisisg->epoca_obra == NULL)
                            @else
                            <tr>
                              <td>  <label for="epoca_obra" class="input-group-addon"style="width: 300px; font-size:20px; border:0;">Epoca de la obra</label></td>
                              <td style=" font-size:20px; text-align:center;">{{ $analisisg->epoca_obra }}</td>
                            </tr>
                            @endif
                            <tr>
                              <td>  <label for="tipo_obj_obra" class="input-group-addon"style="width: 300px; font-size:20px; border:0;">Tipo de objeto de la obra</label></td>
                               <td style=" font-size:20px; text-align:center;">{{$analisisg->tipo_obj_obra }}</td>
                            </tr>
                            <tr>
                            <td><label for="anio_temporada_trabajo" class="input-group-addon" style="width: 300px; font-size:20px;">Año de temporada de trabajo</label></td>
                            <td style=" font-size:20px; text-align:center;">{{$analisisg->anio_temporada_trabajo }}</td>
                        </tr>
                        @if($analisisg->año_de_obra == NULL)
                        @else
                        <tr>
                            <td><label for="año_de_obra" class="input-group-addon" style="width: 300px; font-size:20px;">Año de la Obra</label></td>
                            <td style=" font-size:20px; text-align:center;">{{$analisisg->año_de_obra }}</td>
                        </tr>
                        @endif
                       <tr>
                        <td><label for="respon_intervencion" class="input-group-addon"style="width: 300px; font-size:20px; border:0;">Responsable de la Intervencion</label></td>
                        <td style=" font-size:20px; text-align:center;">{{ $analisisg->respon_intervencion }}</td>
                      </tr>
                     <tr>
                       <td> <label for="tecnica" class="input-group-addon"style="width: 300px; font-size:20px; border:0;">Tecnica</label></td>
                        <td style=" font-size:20px; text-align:center;">{{ $analisisg->tecnica}}"</td>
                     </tr>
                     <tr>
                     <td> <label for="tecnica" class="input-group-addon"style="width: 300px; font-size:20px; border:0;">Fecha de entrada</label></td>
                           <td style=" font-size:20px; text-align:center;">{{ $analisisg->fecha_de_inicio }}</td>
                        </tr>
                 </table>
             </div>
             <!-- -->
                <div align="left"  style="padding-left:-13%">
                    <table "width: 100%" border="0" align="center" cellspacing="4" cellpadding="4">
                        <tr>
                            <th></th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Alto</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Ancho</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Profundidad</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Diametro</th>
                        </tr>
                        <tr>
                            <th style="font-size:30px;">Dimensiones </th>
                            <td><input type="text" class="form-control" name="alto" value="{{ $analisisg->alto}}" style="width:143px; text-align:center; "></td></td>
                            <td><input type="text" class="form-control" name="ancho" value="{{ $analisisg->ancho}}"style="width:143px; text-align:center; "></td></td>
                            <td><input type="text" class="form-control" name="profundidad" value="{{ $analisisg->profundidad}}"style="width:143px; text-align:center; "></td>
                            <td><input type="text" class="form-control" name="diametro" value="{{ $analisisg->diametro}}"style="width:143px; text-align:center; "></td>
                        </tr>
                    </table>

</div>  <!--aca termina-->
<br>
                <div  align="center" style="padding-left:0%">
                    <table style="width: 44%" class="table-bordered" align="center">
                        <tr>
                            <th style="text-align: center; background-color: #7C858C; color:white;">Foto de inicio</th>
                            <th style="text-align: center; background-color: #7C858C; color:white;">Esquema de toma de muestra</th>
                    </tr>
                    <tr>
                        <td align="center">
                            @if($analisisg->foto == 'Sin imagen')
                        <input type="text" class="form-control"  name="foto" border="0" value="Sin imagen" style="width:200px">
                        @else
                        <img  width="400px" src="images/{{$analisisg->foto}}" class="">
                        @endif  
                        </td>
                        <td align="center">
                            @if($analisisg->esquema_muestras == 'Sin imagen')
                        <input type="text" class="form-control"  name="esquema_muestras" border="0" value="Sin imagen" style="width:200px">
                        @else
                        <img  width="400px" src="images/{{$analisisg->esquema_muestras}}" class="">
                        @endif
                        </td>
                        
                    </tr>
                    </table>  
                    </div>
                    <h2 style="background-color: #7C858C; color:white; text-align:center; ">Analisis</h2>
               <!--TABLA SOPORTE  I-->
                @foreach($soportes as $soporte)
                <div class="input-group" id="tabso"  style=" text-align:left;" >
                <label><strong>I. SOPORTE</strong> </label>
                    <table class="table table-bordered" style="width: 50%"> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #C65911; color:white; ">Número de muestra</th>
                                <th style="background-color: #C65911; color:white; ">Nomenclatura</th>
                                <th style="background-color: #C65911; color:white; ">Información requerida</th>
                                <th style="background-color: #C65911; color:white; ">Descripcion de la muestra</th>
                                <th style="background-color: #C65911; color:white; ">Ubicación</th>
                                <th style="background-color: #C65911; color:white; ">Responsable</th>
                                {{-- Se elimina atributo en solicitud de Geovanna --}}
                                {{-- <th style="background-color: #C65911; color:white; ">No. de indentificacion</th> --}}
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
               <div class="input-group" id="tabbase"  style=" text-align:left;">
               <label><strong>II. BASE DE PREPARACIÓN</strong> </label>
                    <table class="table table-bordered" style="width: 50%">
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FFCC66; color:white; ">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white; ">Número de muestra</th>
                                <th style="background-color: #FFCC66; color:white; ">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white; ">Descripcion de la muestra</th>
                                <th style="background-color: #FFCC66; color:white; ">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white; ">Responsable</th>
                                {{-- <th style="background-color: #FFCC66; color:white; ">No. de indentificacion</th> --}}
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
                <div class="input-group" id="tabbase"  style=" text-align:left;">
                <label><strong>III. ESTRATIGRAFÍA</strong> </label>
                    <table class="table table-bordered" style="width: 50%">
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
               <div class="input-group" id="tabbase" style=" text-align:left;">
               <label><strong>IV. REVOQUE Y ENLUCIDO</strong> </label>
                    <table class="table table-bordered" style="width: 50%">
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
               <div class="input-group" id="tabbol" style=" text-align:left;">
               <label><strong>VI. BOL</strong> </label>
                    <table class="table table-bordered" style="width: 50%">
                    
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
               <div class="input-group" id="tabbol" style=" text-align:left;" >
               <label><strong>VII. LÁMINAS METÁLICAS</strong> </label>
                    <table class="table table-bordered" style="width: 50%">

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
               <div class="input-group" id="tabbol" style=" text-align:left;" >
               <label><strong>VIII.PIGMENTOS</strong></label>
                    <table class="table table-bordered" style="width: 50%"> 
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
               <div class="input-group" id="tabbol" style=" text-align:left;">
               <label><strong>IX.AGLUTINANTES</strong></label>
                    <table class="table table-bordered" style="width: 50%">
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
               <div class="input-group" id="tabbol" style=" text-align:left;">
               <label><strong>X. RECUBRIMIENTOS</strong></label>
                    <table class="table table-bordered" style="width: 50%"> 
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
               <div class="input-group" id="tabmaterialaso" style=" text-align:left;">
               <label><strong>XI. MATERIAL ASOCIADO </strong></label>
                    <table class="table table-bordered" style="width: 50%"> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white;">Nomenclatura</th>
                                <th style="background-color: #009999; color:white;">Número de muestra</th>
                                <th style="background-color: #009999; color:white;">Información requerida</th>
                                <th style="background-color: #009999; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #009999; color:white;">Ubicación</th>
                                <th style="background-color: #009999; color:white;">Responsable</th>
                                {{-- <th style="background-color: #009999; color:white;">No. de indentificacion</th> --}}
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
               <div class="input-group" id="tabsales" style=" text-align:left;" >
               <label><strong>XII. SALES </strong></label>
                    <table class="table table-bordered" style="width: 50%"> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white;">Nomenclatura</th>
                                <th style="background-color: #009999; color:white;">Número de muestra</th>
                                <th style="background-color: #009999; color:white;">Información requerida</th>
                                <th style="background-color: #009999; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #009999; color:white;">Ubicación</th>
                                <th style="background-color: #009999; color:white;">Responsable</th>
                                {{-- <th style="background-color: #009999; color:white;">No. de indentificacion</th> --}}
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
               <div class="input-group" id="tabmaterialag"  style=" text-align:left;">
               <label><strong>XIII. MATERIAL AGREGADO </strong> </label>
                    <table class="table table-bordered" style="width: 50%">
                        <thead>
                            <tr align="center">
                                <th style="background-color: #7D10C0; color:white;">Nomenclatura</th>
                                <th style="background-color: #7D10C0; color:white;">Número de muestra</th>
                                <th style="background-color: #7D10C0; color:white;">Información requerida</th>
                                <th style="background-color: #7D10C0; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #7D10C0; color:white;">Ubicación</th>
                                <th style="background-color: #7D10C0; color:white;">Responsable</th>
                                {{-- <th style="background-color: #7D10C0; color:white;">No. de indentificacion</th> --}}
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
               <div class="input-group" id="tabbiodeterioro"  style=" text-align:left;">
               <label><strong>XIV. BIODETERIORO </strong></label>
                    <table class="table table-bordered" style="width: 50%"> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A2C866; color:white;">Nomenclatura</th>
                                <th style="background-color: #A2C866; color:white;">Número de muestra</th>
                                <th style="background-color: #A2C866; color:white;">Información requerida</th>
                                <th style="background-color: #A2C866; color:white;">Descripcion de la muestra</th>
                                <th style="background-color: #A2C866; color:white;">Ubicación</th>
                                <th style="background-color: #A2C866; color:white;">Responsable</th>
                                {{-- <th style="background-color: #A2C866; color:white;">No. de indentificacion</th> --}}
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
               <div class="input-group" id="tabbase"  style=" text-align:left;">
               <label><strong>XV. OTROS</strong></label>
                    <table class="table table-bordered" style="width: 50%"> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A5A5A5; color:white;" >Número de muestra</th>
                                <th style="background-color: #A5A5A5; color:white;" >Nomenclatura</th>
                                <th style="background-color: #A5A5A5; color:white;" >Información requerida</th>
                                <th style="background-color: #A5A5A5; color:white;" >Descripcion de la muestra</th>
                                <th style="background-color: #A5A5A5; color:white;" >Ubicación</th>
                                <th style="background-color: #A5A5A5; color:white;" >Responsable</th>
                                {{-- <th style="background-color: #A5A5A5; color:white;" >No. de indentificacion</th> --}}
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
                <br><br>
                  
                </form>
        </div>
	</div>
</div