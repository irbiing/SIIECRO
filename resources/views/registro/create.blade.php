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
                <h1>Registro de Análisis Científico </h1>
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
                <form action="{{ route('RegistroCientifico.store') }}" method="POST" class="form-inline text-left" enctype="multipart/form-data">
                    @csrf 
                    <input hidden="" type="text" name="id_gene" value="{{ $analisisg->id_general }}">
                    <div align="center">
                        <table style="width: 50%"  border="0">
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos Generales</h3></th></tr>
                            <tr>
                                <td><label for="id_obras" class="input-group-addon" style="width: 400px">ID Obra </label></td>
                                <td><input type="text" name="id_obras" class="form-control"  value="{{ $analisisg->id_de_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label class="input-group-addon">Titulo de la obra/pieza</label></td>
                                <td><input type="text" name="titulo_Obra" class="form-control"  value="{{ $analisisg->titulo_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label class="input-group-addon">Temporada de trabajo</label></td>
                                <td><select class="form-control" name="temporada_trabajo" style="width: 500px; text-align:center;">
                                <option value="" style="text-align:center;">Selecciona una opción</option>
                                @foreach($tempo as $tempos)
                                <option value="{{$tempos->temporada_trabajo}}" >{{$tempos->temporada_trabajo}}</option>
                                @endforeach
                            </select></td>
                            </tr>
                            <tr>    
                                <td><label for="epoca" class="input-group-addon">Epoca de la obra</label></td>
                                <td><input type="text" name="epoca" class="form-control"  value="{{ $analisisg->epoca_obra }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label class="input-group-addon">Año de la temporada de trabajo</label></td>
                                <td><input type="text" class="form-control"  name="anio_temporada"  value="{{ $analisisg->anio_temporada_trabajo}}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;"><i class="fa fa-calendar"> Fecha de inicio</i></td>
                                <td><input type="date" class="form-control date" name="fecha_inicio" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ $analisisg->fecha_de_inicio }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="tecnica" class="input-group-addon">Técnica</label></td>
                                <td><input type="text" class="form-control"  name="tecnica" value="{{ $analisisg->tecnica }}" style="width:500px; text-align:center;" readonly></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos de Intentificación de la Muestra</h3></th>
                            </tr>
                            <tr>
                            <tr>
                                <td><label for="nomenclatura_muestra" class="input-group-addon">Nomenclatura de la muestra</label></td>
                                <td><select type="text" class="form-control"  name="nomenclatura_muestra" style="width:500px; text-align:center;" >
                                    <option value="" style="text-align:center;">Selecciona una opción</option>
                                    @foreach($soportes as $soporte)
                                <option value="{{$soporte->soporte_nomenclatura}}" >{{$soporte->soporte_nomenclatura}}</option>
                                @endforeach
                                @foreach($baseP as $basesP)
                                <option value="{{$basesP->base_nomenclatura}}" >{{$basesP->base_nomenclatura}}</option>
                                @endforeach
                                @foreach($estratigrafia as $estratigrafias)
                                <option value="{{$estratigrafias->estratigrafia_nomenclatura}}" >{{$estratigrafias->estratigrafia_nomenclatura}}</option>
                                @endforeach
                                @foreach($revoque as $revoques)
                                <option value="{{$revoques->revoque_nomenclatura}}" >{{$revoques->revoque_nomenclatura}}</option>
                                @endforeach
                                @foreach($bol as $bols)
                                <option value="{{$bols->bol_nomenclatura}}" >{{$bols->bol_nomenclatura}}</option>
                                @endforeach
                                @foreach($lamina as $laminas)
                                <option value="{{$laminas->laminas_nomenclatura}}" >{{$laminas->laminas_nomenclatura}}</option>
                                @endforeach
                                @foreach($pigmento as $pigmentos)
                                <option value="{{$pigmentos->pigmentos_nomenclatura}}" >{{$pigmentos->pigmentos_nomenclatura}}</option>
                                @endforeach
                                @foreach($aglutinante as $aglutinantes)
                                <option value="{{$aglutinantes->aglutinante_nomenclatura}}" >{{$aglutinantes->aglutinante_nomenclatura}}</option>
                                @endforeach
                                @foreach($recubrimiento as $recubrimientos)
                                <option value="{{$recubrimientos->recubrimiento_nomenclatura}}" >{{$recubrimientos->recubrimiento_nomenclatura}}</option>
                                @endforeach
                                @foreach($maso as $masos)
                                <option value="{{$masos->materialaso_nomenclatura}}" >{{$masos->materialaso_nomenclatura}}</option>
                                @endforeach
                                @foreach($sal as $sales)
                                <option value="{{$sales->sales_nomenclatura}}" >{{$sales->sales_nomenclatura}}</option>
                                @endforeach
                                @foreach($materialag as $materialags)
                                <option value="{{$materialags->materialag_nomenclatura}}" >{{$materialags->materialag_nomenclatura}}</option>
                                @endforeach
                                @foreach($biodeterioro as $biodeterioros)
                                <option value="{{$biodeterioros->biodeterioro_nomenclatura}}" >{{$biodeterioros->biodeterioro_nomenclatura}}</option>
                                @endforeach
                                @foreach($otro as $otros)
                                <option value="{{$otros->otros_nomenclatura}}" >{{$otros->otros_nomenclatura}}</option>
                                @endforeach
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="lugar_de_resguardo" class="input-group-addon">Lugar de Resguardo</label></td>
                                <td><input type="text" class="form-control"  name="lugar_de_resguardo" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="caracte_analisis" class="input-group-addon">Caracterización de análisis</label></td>
                                <td><input type="text" class="form-control"  name="caracte_analisis" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;"><i class="fa fa-calendar" > Fecha de análisis científicos</i></td>
                                <td><input type="date" class="form-control date" name="fecha_analisis_cientifico" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="profesor_responsable" class="input-group-addon">Profesor responsable</label></td>
                                <td><input type="text" class="form-control"  name="profesor_responsable" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="persona_realizo_analisis" class="input-group-addon">Persona que realizo el análisis</label></td>
                                <td><input type="text" class="form-control"  name="persona_realizo_analisis" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="forma_obtencion_muestra" class="input-group-addon">Forma de obtención de las muestras</label></td>
                                <td><select class="form-control" id="selectformamuestra" name="forma_obtencion_muestra" onChange="formaobtencion(this)" style="width: 500px; text-align:center;">
                                <option value="" style="text-align:center;">Selecciona una opción</option>
                                <option value="Raspado">Raspado</option>
                                <option value="Cortes profundos">Cortes profundos</option>
                                <option value="Disgregados">Disgregados</option>
                                <option value="Desprendimiento (contextualizado)">Desprendimiento (contextualizado)</option>
                                <option value="Láminas delgadas">Láminas delgadas</option>
                                <option value="Láminas de metales">Láminas de metales</option>
                                <option value="Cortes longitudinales">Cortes longitudinales</option>
                                <option value="Otro">Otro</option>
                                <input type="text" class="form-control" id="formamuestra" name="formamuestra" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;">
                            </select>
                        </td>
                            </tr>
                            <tr>
                                <td><label for="esquema" class="input-group-addon">Esquema</label></td>
                                <td><input type="file" class="form-control"  name="esquema" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="indicaciones" class="input-group-addon">Indicaciones</label></td>
                                <td><input type="text" class="form-control"  name="indicaciones" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="tipo_material" class="input-group-addon">Tipo de material</label></td>
                                <td><select class="form-control" id="selecttipomate" name="tipo_material" onChange="tipomaterial(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Fibra">Fibra</option> 
                                    <option value="Madera">Madera</option>
                                    <option value="Material biológico">Material biológico</option>
                                    <option value="Tintas">Tintas</option>                                   
                                    <option value="Material pétreo">Material pétreo</option>
                                    <option value="Estratigrafía">Estratigrafía</option>
                                    <option value="Metal">Metal</option>
                                    <option value="Cargas">Cargas</option>
                                    <option value="Pigmento">Pigmento</option>
                                    <option value="Colorante">Colorante</option>
                                    <option value="Aglutinante">Aglutinante</option>
                                    <option value="Capas de superficie">Capas de superficie</option>
                                    <option value="Adhesivo">Adhesivo</option>
                                    <option value="Sal">Sal</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <input type="text" class="form-control" id="tipomateotro" name="tipomaterialotro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;">
                            </td>
                            </tr>
                            <tr>
                                <td><label for="descripcion" class="input-group-addon">Descripción</label></td>
                                <td><input type="text" class="form-control"  name="descripcion" style="width:500px; text-align:center;" ></td>
                            </tr>
                            <tr>
                                <td><label for="microfotografia" class="input-group-addon">Microfotografía</label></td>
                                <td><input type="file" class="form-control"  name="microfotografia" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="info_definir" class="input-group-addon">Información por definir</label></td>
                                <td><select class="form-control" id="selectinfo" name="info_definir" onChange="infodefinir(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Morfología">Morfología</option>
                                    <option value="Composición química">Composición química</option>
                                    <option value="Estructuras micromorfológicas">Estructuras micromorfológicas</option>
                                    <option value="Tamaño de partícula">Tamaño de partícula</option>
                                    <option value="Estado de conservación">Estado de conservación</option>
                                    <option value="Distribución de estratos">Distribución de estratos</option>
                                    <option value="Estructuras de solidificación">Estructuras de solidificación</option>
                                    <option value="Catión de Magnesio (Mg)">Catión de Magnesio (Mg)</option>
                                    <option value="Catión de Hierro (Fe)">Catión de Hierro (Fe)</option>
                                    <option value="Catión de Carbono (C )">Catión de Carbono (C)</option>
                                    <option value="Catión de Calcio (Ca)">Catión de Calcio (Ca)</option>
                                    <option value="Catión de Titanio (Ti)">Catión de Titanio (Ti)</option>
                                    <option value="Catión de Vanadio (V)">Catión de Vanadio (V)</option>
                                    <option value="Catión de Cromo (Cr)">Catión de Cromo (Cr)</option>
                                    <option value="Catión de Manganeso (Mn)">Catión de Manganeso (Mn)</option>
                                    <option value="Catión de Hierro (Fe)">Catión de Hierro (Fe)</option>
                                    <option value="Catión de Cobalto (Co)">Catión de Cobalto (Co)</option>
                                    <option value="Catión de Níquel (Ni)">Catión de Níquel (Ni)</option>
                                    <option value="Catión de Cobre (Cu)">Catión de Cobre (Cu)</option>
                                    <option value="Catión de Zinc (Zn)">Catión de Zinc (Zn)</option>
                                    <option value="Catión de Cadmio (Cd)">Catión de Cadmio (Cd)</option>
                                    <option value="Catión de Mercurio (Hg)">Catión de Mercurio (Hg)</option>
                                    <option value="Catión de Aluminio (Al)">Catión de Aluminio (Al)</option>
                                    <option value="Catión de Plomo (Pb)">Catión de Plomo (Pb)</option>
                                    <option value="Catión de Arsénico (As)">Catión de Arsénico (As)</option>
                                    <option value="Catión de Zinc (Zn)">Catión de Zinc (Zn)</option>
                                    <option value="Cationes de Hierro (Fe)">Cationes de Hierro (Fe)</option>
                                    <option value="Sulfato de Calcio (CaSO4)">Sulfato de Calcio (CaSO4)</option>
                                    <option value="Carbonato de Calcio (CaCO3)">Carbonato de Calcio (CaCO3)</option>
                                    <option value="Caolinita (aluminosilicatos-Al2Si2O5)">Caolinita (aluminosilicatos-Al2Si2O5)</option>
                                    <option value="Oro (Au)">Oro (Au)</option>
                                    <option value="Plata (Ag)">Plata (Ag)</option>
                                    <option value="Cobre (Cu)">Cobre (Cu)</option>
                                    <option value="Plomo (Pb)">Plomo (Pb)</option>
                                    <option value="Estaño (Sn)">Estaño (Sn)</option>
                                    <option value="Níquel (Ni)">Níquel (Ni)</option>
                                    <option value="Hierro (Fe)">Hierro (Fe)</option>
                                    <option value="Zinc (Zn)">Zinc (Zn)</option>
                                    <option value="Aluminio (Al)">Aluminio (Al)</option>
                                    <option value="Antimonio (Sb)">Antimonio (Sb)</option>
                                    <option value="Sulfatos de Calcio (Yeso)">Sulfatos de Calcio (Yeso)</option>
                                    <option value="Carbonatos de Calcio (Cal)">Carbonatos de Calcio (Cal)</option>
                                    <option value="Silicatos">Silicatos</option>
                                    <option value="Dióxido de Titanio">Dióxido de Titanio</option>
                                    <option value="Óxido de Zinc">Óxido de Zinc</option>
                                    <option value="Grupo AZO">Grupo AZO</option>
                                    <option value="Grupo Carbonilo">Grupo Carbonilo</option>
                                    <option value="Grupo Ftalocianinas">Grupo Ftalocianinas</option>
                                    <option value="Grupo Poliénicos">Grupo Poliénicos</option>
                                    <option value="Grupo Sulfurados">Grupo Sulfurados</option>
                                    <option value="Grupo Nitro">Grupo Nitro</option>
                                    <option value="Lípidos">Lípidos</option>
                                    <option value="Carbohidratos">Carbohidratos</option>
                                    <option value="Proteínas">Proteínas</option>
                                    <option value="Terpenos o Resinas">Terpenos o Resinas</option>
                                    <option value="Polivinílicas">Polivinílicas</option>
                                    <option value="Acrilatos">Acrilatos</option>
                                    <option value="Alquiládicas">Alquiládicas</option>
                                    <option value="Epóxica">Epóxica</option>
                                    <option value="Poliuretano">Poliuretano</option>
                                    <option value="Nitratos">Nitratos</option>
                                    <option value="Sulfuros">Sulfuros</option>
                                    <option value="Cloruros">Cloruros</option>
                                    <option value="Sulfatos">Sulfatos</option>
                                    <option value="Tanatos">Tanatos</option>
                                    <option value="Fosfatos">Fosfatos</option>
                                    <option value="BTA">BTA</option>
                                    <option value="Sulfatos solubles">Sulfatos solubles</option>
                                    <option value="Sulfatos insolubles">Sulfatos insolubles</option>
                                    <option value="Carbonatos">Carbonatos</option>
                                    <option value="Óxidos">Óxidos</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <input type="text" class="form-control" id="infodefinirotro" name="infodefinirotro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;">
                            </td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Análisis a Realizar</h3></th>
                            </tr>
                            <tr>
                                <td><label for="analisis_morfologico" class="input-group-addon">Análisis Morfológico</label></td>
                                <td><select class="form-control" id="selecmorfo" name="analisis_morfologico" onChange="analmorfo(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Microscópio óptico">Microscópio óptico</option>
                                    <option value="Metalografía">Metalografía</option>
                                    <option value="SEM/MEB">SEM/MEB</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <input type="text" class="form-control" id="analmorfootro" name="analmorfootro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="analisis_microquimico" class="input-group-addon">Análisis microquímico</label></td>
                                <td><select class="form-control" id="selecmicroquimico" name="analisis_microquimico" onChange="analmicroquimico(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Microquímico">Microquímico</option>
                                    <option value="A la Gota">A la Gota</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <input type="text" class="form-control" id="analmicroquimicootro" name="analmicroquimicootro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;">
                            </td>
                            </tr>
                            <tr>
                                <td><label for="analisis_elemental" class="input-group-addon">Análisis elemental</label></td>
                                <td><select class="form-control" id="selecelemental" name="analisis_elemental" onChange="analelemental(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="EDS">EDS</option>
                                    <option value="XRF/FRX">XRF/FRX</option>
                                    <option value="Otro">Otro</option>

                                </select>
                                <input type="text" class="form-control" id="analelementalotro" name="analelementalotro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;">
                            </td>
                            </tr>
                            <tr>
                                <td><label for="analisis_molecular" class="input-group-addon">Análisis molecular</label></td>
                                <td><select class="form-control" id="selecmole" name="analisis_molecular" onChange="analmole(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Cromatografía de gases (CG)">Cromatografía de gases (CG)</option>
                                    <option value="Cromatografía de líquidos (HPLC)">Cromatografía de líquidos (HPLC)</option>
                                    <option value="RAMAN">RAMAN</option>
                                    <option value="DRX">DRX</option>
                                    <option value="Otro">Otro</option>

                                </select>
                                <input type="text" class="form-control" id="analmoleotro" name="analmoleotro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;">
                            </td>
                            </tr>
                            <tr>
                                <td><label for="analisis_de_tincion" class="input-group-addon">Análisis de tinción</label></td>
                                <td><select class="form-control" id="selectincion" name="analisis_de_tincion" onChange="analtincion(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Tinción">Tinción</option>
                                    <option value="Otro">Otro</option>

                                </select>
                                <input type="text" class="form-control" id="analtincionotro" name="analtincionotro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;"></td>
                            </tr>
                            <tr>
                                <td><label for="analisis_microbiologicos" class="input-group-addon">Análisis Microbiológicos</label></td>
                                <td><select class="form-control" id="selecmicrobiologicos" name="analisis_microbiologicos" onChange="analmicrobiologicos(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Cultivos">Cultivos</option>
                                    <option value="Otro">Otro</option>

                                </select>
                                <input type="text" class="form-control" id="analmicrobiologicosotro" name="analmicrobiologicosotro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;"></td>
                            </tr>
                            
                            <tr>
                                <td><label for="otros" class="input-group-addon">Otros</label></td>
                                <td><input type="text" class="form-control"  name="otros" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Resultados</h3></th>
                            </tr>
                        </table>
                            <div id="inputresultados">
                                <table style="width: 50%"  border="0">
                            <tr>
                                <td><label for="resultado_interpretacion" class="input-group-addon" style="width: 400px">Resultado Interpretación</label></td>
                                <td><input type="text" class="form-control" name="resultado_interpretacion0" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="resultado_descripcion" class="input-group-addon">Resultado Descripción</label></td>
                                <td><input type="text" class="form-control" name="resultado_descripcion0" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="resultado_imagenes" class="input-group-addon">Resultado Imagenes</label></td>
                                <td><input type="file" class="form-control" name="resultado_imagenes0" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="resultado_datos" class="input-group-addon">Resultado Datos</label></td>
                                <td><input type="file" class="form-control" name="resultado_datos0" style="width:500px; text-align:center;"><br><br></td>
                            </tr>
                            </table>
                            </div>
                            <tr align=" center">
                                <div align="center">
                                    <td></td>
                                    <td>
                            <input type="button" id="otroresultados" name="otroresultados" class="btn-sm"  value="Agregar más" onclick="javascript:masresultados()"><br><br></td></div>
                            <table style="width: 50%"  border="0">
                            </tr>
                            <tr>
                                <td><label for="resultado_conclucion_general" class="input-group-addon" style="width: 400px">Conclusión General</label></td>
                                <td><input type="text" class="form-control"  name="resultado_conclucion_general" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="interpretacion_particular" class="input-group-addon">Interpretación Particular</label></td>
                                <td><select class="form-control" id="selecinterpretacion" name="interpretacion_particular" onChange="interpretacion(this)" style="width: 500px; text-align: center;">
                                    <option value="">Selecciona una opción</option>
                                    <option value="Fibras de Algodón">Fibras de Algodón</option>
                                    <option value="Fibras de Lino">Fibras de Lino</option>
                                    <option value="Fibras de Cáñamo">Fibras de Cáñamo</option>
                                    <option value="Fibras de Maíz">Fibras de Maíz</option>
                                    <option value="Fibras de Yute">Fibras de Yute</option>
                                    <option value="Fibras de Ramio">Fibras de Ramio</option>
                                    <option value="Fibras de Lana">Fibras de Lana</option>
                                    <option value="Fibras de Seda">Fibras de Seda</option>
                                    <option value="Fibras de Rayón">Fibras de Rayón</option>
                                    <option value="Fibras de Madera">Fibras de Madera</option>
                                    <option value="Fibras de Kozo">Fibras de Kozo</option>
                                    <option value="Fibras de Henequén">Fibras de Henequén</option>
                                    <option value="Coníferas">Coníferas</option>
                                    <option value="Angiospermas">Angiospermas</option>
                                    <option value="Cedro">Cedro</option>
                                    <option value="Roble">Roble</option>
                                    <option value="Caoba">Caoba</option>
                                    <option value="Pino">Pino</option>
                                    <option value="Abeto">Abeto</option>
                                    <option value="Arce">Arce</option>
                                    <option value="Balsa">Balsa</option>
                                    <option value="Ciprés">Ciprés</option>
                                    <option value="Roble">Roble</option>
                                    <option value="Palo de Rosa (Roble Macuitli)">Palo de Rosa (Roble Macuitli)</option>
                                    <option value="Cerezo">Cerezo</option>
                                    <option value="Parota">Parota</option>
                                    <option value="Encino">Encino</option>
                                    <option value="Colorín">Colorín</option>
                                    <option value="Mezquite">Mezquite</option>
                                    <option value="Álamo">Álamo</option>
                                    <option value="Eucalipto">Eucalipto</option>
                                    <option value="Granadillo">Granadillo</option>
                                    <option value="Líquenes">Líquenes</option>
                                    <option value="Microorganismos">Microorganismos</option>
                                    <option value="Insectos">Insectos</option>
                                    <option value="Fitolitos">Fitolitos</option>
                                    <option value="Zoolitos">Zoolitos</option>
                                    <option value="Tinta Ferrogálica">Tinta Ferrogálica</option>
                                    <option value="Tinta de China">Tinta de China</option>
                                    <option value="Tinta de Palo de Campeche">Tinta de Palo de Campeche</option>
                                    <option value="Tintas de Anilina">Tintas de Anilina</option>
                                    <option value="Tintas magras">Tintas magras</option>
                                    <option value="Tintas grasas">Tintas grasas</option>
                                    <option value="Oro (Au)">Oro (Au)</option>
                                    <option value="Plata (Ag)">Plata (Ag)</option>
                                    <option value="Cobre (Cu)">Cobre (Cu)</option>
                                    <option value="Plomo (Pb)">Plomo (Pb)</option>
                                    <option value="Estaño (Sn)">Estaño (Sn)</option>
                                    <option value="Níquel (Ni)">Níquel (Ni)</option>
                                    <option value="Hierro (Fe)">Hierro (Fe)</option>
                                    <option value="Zinc (Zn)">Zinc (Zn)</option>
                                    <option value="Aluminio (Al)">Aluminio (Al)</option>
                                    <option value="Antimonio (Sb)">Antimonio (Sb)</option>
                                    <option value="Oro falso">Oro falso</option>
                                    <option value="Plata falsa">Plata falsa</option>
                                    <option value="Bronce">Bronce</option>
                                    <option value="Hierro (Fe)">Hierro (Fe)</option>
                                    <option value="Sulfato de Calcio (yeso)">Sulfato de Calcio (yeso)</option>
                                    <option value="Carbonato de Calcio">Carbonato de Calcio</option>
                                    <option value="Dióxido de Titanio">Dióxido de Titanio</option>
                                    <option value="Óxido de Zinc">Óxido de Zinc</option>
                                    <option value="Blanco de Plomo (Albayalde)">Blanco de Plomo (Albayalde)</option>
                                    <option value="Blanco de Zinc">Blanco de Zinc</option>
                                    <option value="Blanco de Titanio">Blanco de Titanio</option>
                                    <option value="Litopón">Litopón</option>
                                    <option value="Rojo de Plomo (Minio)">Rojo de Plomo (Minio)</option>
                                    <option value="Rejalgar">Rejalgar</option>
                                    <option value="Anaranjado de Molibdeno">Anaranjado de Molibdeno</option>
                                    <option value="Anaranjado de Cromo">Anaranjado de Cromo</option>
                                    <option value="Rojo de Cadminio">Rojo de Cadminio</option>
                                    <option value="Bermellón">Bermellón</option>
                                    <option value="Amarillo de cobalto">Amarillo de cobalto</option>
                                    <option value="Amarillo de Zinc">Amarillo de Zinc</option>
                                    <option value="Amarillo de Estroncio">Amarillo de Estroncio</option>
                                    <option value="Amarillo de Bario">Amarillo de Bario</option>
                                    <option value="Amarillo de Nápoles">Amarillo de Nápoles</option>
                                    <option value="Amarillo de Cromo">Amarillo de Cromo</option>
                                    <option value="Amarillo de Cadmio">Amarillo de Cadmio</option>
                                    <option value="Amarillo de Plomo y Estaño">Amarillo de Plomo y Estaño</option>
                                    <option value="Oropimente">Oropimente</option>
                                    <option value="Azul cerúleo">Azul cerúleo</option>
                                    <option value="Ultramar">Ultramar</option>
                                    <option value="Lapislázuli">Lapislázuli</option>
                                    <option value="Índigo">Índigo</option>
                                    <option value="Azul Maya">Azul Maya</option>
                                    <option value="Azul Egipcio">Azul Egipcio</option>
                                    <option value="Esmalte">Esmalte</option>
                                    <option value="Azul Cobalto">Azul Cobalto</option>
                                    <option value="Azurita">Azurita</option>
                                    <option value="Azul de Prusia">Azul de Prusia</option>
                                    <option value="Azul de Manganeso">Azul de Manganeso</option>
                                    <option value="Verdi gris">Verdi gris</option>
                                    <option value="Crisocola">Crisocola</option>
                                    <option value="Malaquita">Malaquita</option>
                                    <option value="Resinato de Cobre">Resinato de Cobre</option>
                                    <option value="Verde de Cobalto">Verde de Cobalto</option>
                                    <option value="Verde Viridiana">Verde Viridiana</option>
                                    <option value="Verde de Cromo">Verde de Cromo</option>
                                    <option value="Violeta de Cobalto">Violeta de Cobalto</option>
                                    <option value="Púrpura">Púrpura</option>
                                    <option value="Violeta de Manganeso">Violeta de Manganeso</option>
                                    <option value="Sepia">Sepia</option>
                                    <option value="Ocre oscuro (limonita)">Ocre oscuro (limonita)</option>
                                    <option value="Rojo Inglés (hematita)">Rojo Inglés (hematita)</option>
                                    <option value="Siena natural">Siena natural</option>
                                    <option value="Siena tostada">Siena tostada</option>
                                    <option value="Sombra natural">Sombra natural</option>
                                    <option value="Sombra tostada">Sombra tostada</option>
                                    <option value="Tierra de Verona">Tierra de Verona</option>
                                    <option value="Aerinita">Aerinita</option>
                                    <option value="Negro Marfil">Negro Marfil</option>
                                    <option value="Negro de Humo">Negro de Humo</option>
                                    <option value="Negro carbón">Negro carbón</option>
                                    <option value="Grafito">Grafito</option>
                                    <option value="Verde iris (laca)">Verde iris (laca)</option>
                                    <option value="Verde de Ftalocianina">Verde de Ftalocianina</option>
                                    <option value="Azul de Ftalocianina">Azul de Ftalocianina</option>
                                    <option value="Laca amarilla">Laca amarilla</option>
                                    <option value="Amarillo Indio">Amarillo Indio</option>
                                    <option value="Amarillo de Azafrán">Amarillo de Azafrán</option>
                                    <option value="Alizarina">Alizarina</option>
                                    <option value="Cochinilla">Cochinilla</option>
                                    <option value="Púrpura pansa">Púrpura pansa</option>
                                    <option value="Madera de Brasil">Madera de Brasil</option>
                                    <option value="Polisacáridos">Polisacáridos</option>
                                    <option value="Proteínas">Proteínas</option>
                                    <option value="Lípido">Lípido</option>
                                    <option value="Terpenos o Resinas">Terpenos o Resinas</option>
                                    <option value="Acrílico">Acrílico</option>
                                    <option value="Polivinílico">Polivinílico</option>
                                    <option value="Epóxico">Epóxico</option>
                                    <option value="Poliuretano">Poliuretano</option>
                                    <option value="Alquiliádicas">Alquiliádicas</option>
                                    <option value="Siliconas">Siliconas</option>
                                    <option value="Poliésteres">Poliésteres</option>
                                    <option value="Poliméricos">Poliméricos</option>
                                    <option value="Sulfatos solubles">Sulfatos solubles</option>
                                    <option value="Sulfatos insolubles">Sulfatos insolubles</option>
                                    <option value="Óxidos">Óxidos</option>
                                    <option value="Nitratos">Nitratos</option>
                                    <option value="Cloruros">Cloruros</option>
                                    <option value="Carbonatos">Carbonatos</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <input type="text" class="form-control" id="analinterpretacionotro" name="analinterpretacionotro" placeholder="Otro" value="" style="width:500px; font-size:18px; display: none;"></td>
                            </tr>
                           
                        </table>
                    </div> 
                    <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-sm">Capturar</button>
                            <a href="{{route('registro.index')}}" class="btn btn-danger btn-sm">Cancelar</a>
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection