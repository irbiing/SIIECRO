@extends('adminlte::layouts.app')

@section('main-content')

<div class="box">
    <div class="box-body"  >
            <div class="panel">
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
                <form action="{{ route('AnalisisCientifico.store') }}" method="POST" class="form-inline text-left" enctype="multipart/form-data">

                    @csrf
                    <input hidden="" type="text" name="id_obra" value="{{ $obra->id }}">
                    <BR>
                    <div style="overflow-x: auto;" align="center">
                    <table style="width: 50%"  border="0" >
                        <tr><th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos Generales</h3></th></tr>
                        <tr >
                            <td><label for="id_de_obra" class="input-group-addon" style="width: 300px; border:0;">ID Obra </label></td>
                            <td><input type="text" name="id_de_obra" class="form-control"  value="{{ $obra->id_de_obras }}" style="width:500px; text-align:center; " readonly></td>
                        </tr>
                        <tr>
                            <td><label for="titulo_obra" class="input-group-addon" style="width: 300px; border:0;">Titulo de la obra/pieza</label></td>
                            <td><input type="text" name="titulo_obra" class="form-control"  value="{{ $obra->titulo_obra }}" style="width:500px; text-align:center;" readonly></td>
                        </tr>
                        <tr>
                            <td><span class="input-group-addon" style="width: 300px; border:0;">Temporalidad</span></td>
                            <td><input type="text" name="temp_obra" class="form-control"  value="12" style="width:500px; text-align:center;" readonly></td>
                        </tr>
                        @if($obra->epoca_obra == NULL)
                        @else
                        <tr>
                            <td><label for="epoca_obra" class="input-group-addon" style="width: 300px; border:0;">Epoca de la obra</label></td>
                            <td><input type="text" name="epoca_obra" class="form-control"  value="{{ $obra->epoca_obra }}" style="width:500px; text-align:center;" readonly></td>
                        </tr>
                        @endif
                        @if($obra->año_de_obra == NULL)
                        @else
                        <tr>
                            <td><label for="año_de_obra" class="input-group-addon" style="width: 300px;">Año de la Obra</label></td>
                            <td><input type="text" name="año_de_obra" class="form-control"  value="{{$obra->año }}" style="width:500px; text-align:center;" readonly></td>
                        </tr>
                        @endif
                        <tr>
                            <td><label for="tipo_obj_obra" class="input-group-addon" style="width: 300px;">Tipo de objeto de la obra</label></td>
                            <td><input type="text" name="tipo_obj_obra" class="form-control"  value="{{$obra->tipo_obj_obra }}" style="width:500px; text-align:center;" readonly></td>
                        </tr>
                        <tr>
                            <td><span class="input-group-addon" style="width: 300px; border:0;">Área de la obra</span></td>
                            <td><input type="text" name="sector_obra" class="form-control"  value="{{ $obra->sector_obra }}" style="width:500px; text-align:center;" readonly></td>
                        </tr>
                        
                        <tr>
                            <td><label for="anio_temporada_trabajo" class="input-group-addon" style="width: 300px;">Año de la temporada de trabajo</label></td>
                            <td><select class="form-control" name="anio_temporada_trabajo" style="width: 500px; text-align:center;">
                                <option value="" style="text-align:center;">Selecciona una opción</option>
                                @foreach($anio as $anios)
                                <option value="{{$anios->anio_temporada_trabajo}}" >{{$anios->anio_temporada_trabajo}}</option>
                                @endforeach
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="tecnica" class="input-group-addon" style="width: 300px; ">Técnica</label></td>
                            <td><input type="text" class="form-control"  name="tecnica" value="{{ old('tecnica') }}" style="width:500px; text-align:center;"></td>
                        </tr>
                        
                        <tr>
                            <td><label for="respon_intervencion" class="input-group-addon" style="width: 300px; text-align:center;">Responsable de la Intervención</label></td>
                            <td><input type="text" class="form-control"  name="respon_intervencion"  value="{{ old('respon_intervencion') }}" style="width:500px;text-align:center;"></td>
                        </tr>
                        <tr>
                            <td><label for="foto" class="input-group-addon "style="width: 300px;text-align:center;">Foto de inicio</label></td>
                            <td><input type="file" class="form-control"  name="foto"  style="width: 500px;"></td>
                        </tr>
                        <tr>
                            <td><label for="esquema_muestras" class="input-group-addon "style="width: 300px;text-align:center;">Esquema de toma de muestra</label></td>
                            <td><input type="file" class="form-control"  name="esquema_muestras"  style="width: 500px;"></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-calendar"> Fecha de inicio</i></td>
                            <td><input type="date" class="form-control date" name="fecha_de_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)"value="{{ old('fecha_de_inicio') }}" style="width:500px; text-align:center;"></td>
                        </tr>
                    </table>
                    <br>
                    <div style="padding-left: 20%" align="left">
                    <table>
                        <tr>
                            <th></th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Alto</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Ancho</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Profundidad</th>
                            <th style="text-align:center; background-color: #7C858C; color:white;">Diámetro</th>
                        </tr>
                        <tr>
                            <th>Dimensiones</th>
                            <td><input type="text" class="form-control" name="alto" value="{{ old('alto') }}" style="width:200px; text-align:center; "></td></td>
                            <td><input type="text" class="form-control" name="ancho" value="{{ old('ancho') }}"style="width:200px; text-align:center; "></td></td>
                            <td><input type="text" class="form-control" name="profundidad" value="{{ old('profundidad') }}"style="width:200px; text-align:center; "></td>
                            <td><input type="text" class="form-control" name="diametro" value="{{ old('diametro') }}"style="width:200px; text-align:center; "></td>
                        </tr>
                    </table>

</div><br><br>
                
                <table class="table table-bordered"><h3 style="text-align:center; background-color: #7C858C; color:white;">ANÁLISIS</h3><br></div>
                    <thead>
                        <tr>
                            <th><label><input type="checkbox" name="tsoporte" id="tsoporte" onchange="javascript:showSoporte()">I. SOPORTE</label><br></th>
                            <th><label><input type="checkbox" name="tbase" id="tbase" onchange="javascript:showBase()">II. BASE DE PREPARACIÓN</label><br></th>
                            <th><label><input type="checkbox" name="testra" id="testra" onchange="javascript:showEstra()">III. ESTRATIGRAFÍA</label></th>
                            <th><label><input type="checkbox" name="trevo" id="trevo" onchange="javascript:showRevo()">IV. REVOQUE Y ENLUCIDO</label></th>
                            <th><label><input type="checkbox" name="tbol" id="tbol" onchange="javascript:showBol()">VI. BOL</label></th>
                            <th><label><input type="checkbox" name="tlame" id="tlami" onchange="javascript:showLami()">VII. LÁMINAS METÁLICAS</label></th>
                            <th><label><input type="checkbox" name="tpig" id="tpig" onchange="javascript:showPig()">VIII. PIGMENTOS</label></th>



                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td><label><input type="checkbox" name="taglu" id="taglu" onchange="javascript:showAglu()">IX. AGLUTINANTE</label></td>
                                <td><label><input type="checkbox" name="trecu" id="trecu" onchange="javascript:showRecu()">X. RECUBRIMIENTO</label></td>
                                <td><label><input type="checkbox" name="tmaso" id="tmaso" onchange="javascript:showMaso()">XI. MATERIAL ASOCIADO</label></td>
                                <td><label><input type="checkbox" name="tsal" id="tsal" onchange="javascript:showSal()">XII. SALES</label></td>
                                <td><label><input type="checkbox" name="tmagre" id="tmagre" onchange="javascript:showMagre()">XIII. MATERIAL AGREGADO</label></td>
                                <td><label><input type="checkbox" name="tbio" id="tbio" onchange="javascript:showBio()">XIV. BIODETERIORO</label></td>
                                <td><label><input type="checkbox" name="totro" id="totro" onchange="javascript:showOtro()">XV. OTROS</label></td>
                                </tr>
                        </tbody>
                </table>

                <!--SOPORTE -->
                <div class="input-group" id="tabso" style="display: none;">
                    <div class="input-group" id="inputsoporte" >
                    <table class="table table-bordered"><strong>I.SOPORTE</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #C65911; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #C65911; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #C65911; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #C65911; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="Smuestra0" style="width:300px"></td>
                                <td><input type="text" name="Snomenclatura0" style="width:300px"></td>
                                <td><input type="text" name="Sinf_requerida0" style="width:300px"></td>
                                <td><input type="text" name="Sdes_muestra0" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #C65911; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #C65911; color:white; width:300px">Responsable</th>
                                {{-- Se elimina atributo en solicitud de Geovanna --}}
                                {{-- <th style="background-color: #C65911; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Subicacion0" style="width:300px"></td>
                                <td><input type="text" name="Sresponsable0" style="width:300px"></td>
                                {{-- Se elimina atributo en solicitud de Geovanna --}}
                                {{-- <td><input type="text" name="Siden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                    <input type="button" id="otrosoporte" name="otrosoporte" class="btn-sm"  value="Agregar más" onclick="javascript:massoporte()">
                    <br><br>
                </div>
                </div>

                <!--BASE DE PREPARACION -->
                <div class="input-group" id="tabbase" style="display: none;">
                    <div class="input-group" id="inputbase" >
                    <table class="table table-bordered"><strong>II.BASE DE PREPARACIÓN</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FFCC66; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Descripción de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BPmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="BPnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="BPinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="BPdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #FFCC66; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #FFCC66; color:white; width:300px">No. de indentificación</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BPubicacion0" style="width:300px"></td>
                                <td><input type="text" name="BPresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="BPiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div align="center">
                    <input type="button" id="otrobase" name="otrobase" class="btn-sm"  value="Agregar más" onclick="javascript:masbase()">
                    <br><br>
                </div>
                </div>


                <!--ESTATIGRAFIA-->
                <div class="input-group" id="tabestra" style="display: none;">
                    <div class="input-group" id="inputestratigrafia" >
                    <table class="table table-bordered"><strong>III. ESTRATIGRAFÍA</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #008000; color:white; width:300px"> Número de muestra</th>
                                <th style="background-color: #008000; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #008000; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #008000; color:white; width:300px">Descripción de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Emuestra0" style="width:300px"></td>
                                        <td><input type="text" name="Enomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="Einf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="Edes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #008000; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #008000; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #008000; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Eubicacion0" style="width:300px"></td>
                                <td><input type="text" name="Eresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="Eiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                    <input type="button" id="otroestratigrafia" name="otroestratigrafia" class="btn-sm"  value="Agregar más" onclick="javascript:masestratigrafia()">
                    <br><br>
                </div>
                </div>

                <!--REVOQUE Y ENLUCIDO-->
                <div class="input-group" id="tabrevo" style="display: none;">
                    <div class="input-group" id="inputrevoque" >
                    <table class="table table-bordered"><strong>IV.REVOQUE Y ENLUCIDO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #B248A5; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="REmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="REnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="REinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="REdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #B248A5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #B248A5; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="REubicacion0" style="width:300px"></td>
                                <td><input type="text" name="REresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="REiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div align="center">
                    <input type="button" id="otrorevoque" name="otrorevoque" class="btn-sm"  value="Agregar más" onclick="javascript:masrevoque()">
                    <br><br>
                </div>
                </div>

                <!--BOL-->
                <div class="input-group" id="tabbol" style="display: none;">
                    <div class="input-group" id="inputbol">
                    <table class="table table-bordered"><strong>VI.BOL</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FF5050; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BOLmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="BOLnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="BOLinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="BOLdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #FF5050; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Responsable</th>    
                                {{-- <th style="background-color: #FF5050; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BOLubicacion0" style="width:300px"></td>
                                <td><input type="text" name="BOLresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="BOLiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div align="center">
                        <input type="button" id="otrobol" name="otrobol" class="btn-sm"  value="Agregar más" onclick="javascript:masbol()">
                        <br><br>
                    </div>
                </div>

                <!--LAMINAS METALICAS-->
                <div class="input-group" id="tablami" style="display: none;">
                    <div class="input-group" id="inputlaminas">
                    <table class="table table-bordered"><strong>VI.LAMINAS METALICAS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #3A5754; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="LMmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="LMnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="LMinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="LMdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #3A5754; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #3A5754; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="LMubicacion0" style="width:300px"></td>
                                <td><input type="text" name="LMresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="LMiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div align="center">
                        <input type="button" id="otrolaminas" name="otrolaminas" class="btn-sm"  value="Agregar más" onclick="javascript:maslaminas()">
                        <br><br>
                    </div>
                </div>

                <!--PIGMENTOS-->
                <div class="input-group" id="tabpig" style="display: none;">
                    <div class="input-group" id="inputpigmentos">
                    <table class="table table-bordered"><strong>VII.PIGMENTOS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #5B9BD5; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Pmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="Pnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="Pinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="Pdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #5B9BD5; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Pubicacion0" style="width:300px"></td>
                                <td><input type="text" name="Presponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="Piden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                        <input type="button" id="otropigmentos" name="otropigmentos" class="btn-sm"  value="Agregar más" onclick="javascript:maspigmentos()">
                        <br><br>
                    </div>
                </div>
                

                <!--AGLUTINANTE-->
                <div class="input-group" id="tabaglu" style="display: none;">
                    <div class="input-group" id="inputaglutinante">
                    <table class="table table-bordered"><strong>VIII.AGLUTINANTE</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #F55587; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #F55587; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #F55587; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #F55587; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Amuestra0" style="width:300px"></td>
                                        <td><input type="text" name="Anomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="Ainf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="Ades_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #F55587; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #F55587; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #F55587; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Aubicacion0" style="width:300px"></td>
                                <td><input type="text" name="Aresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="Aiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                        <input type="button" id="otroaglutinante" name="otroaglutinante" class="btn-sm"  value="Agregar más" onclick="javascript:masaglutinante()">
                        <br><br>
                    </div>
                </div>
               
               
                <!--RECUBRIMIENTO-->
                <div class="input-group" id="tabrecu" style="display: none;">
                    <div class="input-group" id="inputrecubrimiento">
                    <table class="table table-bordered"><strong>IX.RECUBRIMIENTO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FBAE47; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="Rmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="Rnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="Rinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="Rdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #FBAE47; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #FBAE47; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Rubicacion0" style="width:300px"></td>
                                <td><input type="text" name="Rresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="Riden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                        <input type="button" id="otrorecubrimiento" name="otrorecubrimiento" class="btn-sm"  value="Agregar más" onclick="javascript:masrecubrimiento()">
                        <br><br>
                    </div>
                    </div>


                <!-- MATERIAL ASOCIADO X -->
                <div class="input-group" id="tabmaso" style="display: none;">
                <div class="input-group" id="inputmaso" > 
                    <table class="table table-bordered"><strong>X.MATERIAL ASOCIADO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color:#8686C4; color:white; width:300px">Número de muestra</th>
                                <th style="background-color:#8686C4; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color:#8686C4; color:white; width:300px">Información requerida</th>
                                <th style="background-color:#8686C4; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="MASOmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="MASOnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="MASOinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="MASOdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color:#8686C4; color:white; width:300px">Ubicación</th>
                                <th style="background-color:#8686C4; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color:#8686C4; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="MASOubicacion0" style="width:300px"></td>
                                <td><input type="text" name="MASOresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="MASOiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div align="center">
                        <input type="button" id="otromaso" name="otromaso" class="btn-sm"  value="Agregar más" onclick="javascript:masmaso()">
                        <br><br>
                    </div>
                </div>


                <!-- SALES XI -->
                <div class="input-group" id="tabsal" style="display: none;">
                <div class="input-group" id="inputsales" > 
                    <table class="table table-bordered"><strong>XI.SALES</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color:#009999; color:white; width:300px">Número de muestra</th>
                                <th style="background-color:#009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color:#009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color:#009999; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="SALmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="SALnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="SALinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="SALdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color:#009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color:#009999; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color:#009999; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="SALubicacion0" style="width:300px"></td>
                                <td><input type="text" name="SALresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="SALiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div align="center">
                        <input type="button" id="otrosal" name="otrosal" class="btn-sm"  value="Agregar más" onclick="javascript:massales()">
                        <br><br>
                    </div>
                </div>


                <!-- NATERIAL AGREGADO XII-->
                <div class="input-group" id="tabmagre" style="display: none;">
                <div class="input-group" id="inputmaterialag" > 
                    <table class="table table-bordered"><strong>XII.MATERIAL AGREGADO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color:#7D10C0; color:white; width:300px">Número de muestra</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">Información requerida</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="MAGmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="MAGnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="MAGinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="MAGdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color:#7D10C0; color:white; width:300px">Ubicación</th>
                                <th style="background-color:#7D10C0; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color:#7D10C0; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="MAGubicacion0" style="width:300px"></td>
                                <td><input type="text" name="MAGresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="MAGiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div align="center">
                        <input type="button" id="otromatag" name="otromatag" class="btn-sm"  value="Agregar más" onclick="javascript:masmatag()">
                        <br><br>
                    </div>
                </div>


                <!-- BIODETERIODO XIII-->
                <div class="input-group" id="tabbio" style="display: none;">
                <div class="input-group" id="inputbiodeterioro" > 
                    <table class="table table-bordered"><strong>XIII.BIODETERIODO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color:#A2C866; color:white; width:300px">Número de muestra</th>
                                <th style="background-color:#A2C866; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color:#A2C866; color:white; width:300px">Información requerida</th>
                                <th style="background-color:#A2C866; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="BDTmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="BDTnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="BDTinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="BDTdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color:#A2C866; color:white; width:300px">Ubicación</th>
                                <th style="background-color:#A2C866; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color:#A2C866; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BDTubicacion0" style="width:300px"></td>
                                <td><input type="text" name="BDTresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="BDTiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div align="center">
                        <input type="button" id="otrobio" name="otrobio" class="btn-sm"  value="Agregar más" onclick="javascript:masbio()">
                        <br><br>
                    </div>
                </div>


                <!--OTROS XIV-->
                <div class="input-group" id="tabotro" style="display: none;">
                    <div class="input-group" id="inputotros">
                    <table class="table table-bordered"><strong>XIV.OTROS</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A5A5A5; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Descripcion de la muestra</th>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="OTmuestra0" style="width:300px"></td>
                                        <td><input type="text" name="OTnomenclatura0" style="width:300px"></td>
                                        <td><input type="text" name="OTinf_requerida0" style="width:300px"></td>
                                        <td><input type="text" name="OTdes_muestra0" style="width:300px"></td>
                                    </tr>
                                </tbody>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Responsable</th>
                                {{-- <th style="background-color: #A5A5A5; color:white; width:300px">No. de indentificacion</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="OTubicacion0" style="width:300px"></td>
                                <td><input type="text" name="OTresponsable0" style="width:300px"></td>
                                {{-- <td><input type="text" name="OTiden_muestra0" style="width:300px"></td> --}}
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <div align="center">
                        <input type="button" id="otrootros" name="otrootros" class="btn-sm"  value="Agregar más" onclick="javascript:masotros()">
                        <br><br>
                    </div>
                </div>
                    <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Capturar</button>
                            <a href="{{route('Obras.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection

