@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')




<div class="box">
    <div class="box-body"  >
        <div class="panel">
            <h1 align="center">Registrar Obra</h1>
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
            <form action="{{ route('Obras.index') }}" method="POST" class="form-inline text-left" >
                @csrf
                <BR>
                <div id="tabla" align="center">
                    <table style="width: 65%" border="0" align="center">
                        <tr><th colspan="2" style="text-align:center; background-color: #7C858C; color:white;"><h3>Datos Generales</h3></th></tr>
                        @permission('Captura_Registro_Avanzada_2')
                            <tr>
                                <td style="font-size:25px;">ID de Obra:</td>
                                <td style="font-size:25px;">
                                    <input type="text" name="id_de_obras" class="form-control" placeholder="ID de la Obra"  value="{{ old('id_de_obras') }}" style="width:550px; font-size:18px;">
                                </td>
                            </tr>
                        @endpermission
                        <tr>
                            <td style="font-size:25px;">Título de la Obra:</td>
                            <td style="font-size:25px;"><input type="text" name="titulo_obra" class="form-control" placeholder="Titulo de la Obra" value="{{ old('titulo_obra') }}" style="width:550px; font-size:18px;"></td>
                        </tr>
                        <tr id="autor">
                            <td style="font-size:25px;">Autor:</td>
                            <td>
                                <input type="text" class="form-control"  name="autor" placeholder="Autor" value="{{ old('autor') }}" style=" width:550px; font-size:18px; ">
                            </td>
                        </tr>
                        <tr id="cultura">
                          <td style="font-size:25px;">Cultura:</td>
                          <td style="font-size:25px; ">

                            <input type="text" class="form-control"   name="cultura" placeholder="Cultura" value="{{ old('cultura') }}" style=" width:550px; font-size:18px; ">
                          </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Tipo de Bien Cultural:</td>
                            <td style="font-size:25px;">
                                <select class="input-group-addon" onChange="tipodebien(this)" name="tipo_bien_cultu" id="tipo_bien_cultural" value="{{ old('tipo_bien_cultu') }}" style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una opción</option>
                                    <option>Arqueológico</option>
                                    <option>Artístico</option>
                                    <option>Histórico</option>
                                    <option>Documental</option>
                                    <option>Religioso</option>
                                    <option>Industrial</option>
                                    <option>Etnográfico</option>
                                    <option>Otro</option>
                                </select>
                            <input type="text" class="form-control" id="tbcotro" name="tipobotro" placeholder="Otro" value="" style="width:550px; font-size:18px; display: none;"></td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Tipo de Objeto de la Obra:</td>
                            <td style="font-size:25px;">
                                <select type="text" name="tipo_obj_obra" id="tipoobjeto" onChange="tipodeobjeto(this)"  class="input-group-addon" placeholder="Tipo de Objeto de la Obra" value="{{ old('tipo_obj_obra') }}" style="width:550px; font-size:18px;">
                                  <option value="" >Selecciona una opción</option>
                                  <option>Cerámica</option>
                                  <option>Textil</option>
                                  <option>Pintura Mural</option>
                                  <option>Plafones</option>
                                  <option>Pintura sobre Lienzo</option>
                                  <option>Pintura sobre Tabla</option>
                                  <option>Tecnica Mixta</option>
                                  <option>Escultura Policromada</option>
                                  <option>Escultura Ligera</option>
                                  <option>Escultura</option>
                                  <option>Marcos</option>
                                  <option>Muebles</option>
                                  <option>Retablos</option>
                                  <option>Manuscritos</option>
                                  <option>Mapas</option>
                                  <option>Planos</option>
                                  <option>Croquis</option>
                                  <option>Cartas (Cartografías)</option>
                                  <option>Carteles</option>
                                  <option>Impresos</option>
                                  <option>Obras Gráficas</option>
                                  <option>Instrumento Musical</option>
                                  <option>Armas Blancas</option>
                                  <option>Armas de Fuego</option>
                                  <option>Pintura sobre Lámina</option>
                                  <option>Mecánico</option>
                                  <option>Utilitario</option>
                                  <option>Científico</option>
                                  <option>Otro</option>
                                </select>
                                <input type="text" class="form-control" id="tdootro" name="tipoobjetootro" placeholder="Otro" value="" style="width:550px; font-size:18px; display: none;">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Lugar de Procedencia Actual:</td>
                            <td style="font-size:25px;">
                                <input type="text" class="form-control" placeholder="Lugar de Procedencia Actual" name="lugar_proce_act"  value="{{ old('lugar_proce_act') }}" style="width:550px; font-size:18px;">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Lugar de Procedencia Original:</td>
                            <td style="font-size:25px;">
                                <input type="text" class="form-control"  name="lugar_proce_ori" placeholder="Lugar de Procedencia Original" value="{{ old('lugar_proce_ori') }}" style="width:550px; font-size:18px;">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">No. de inventario de la Obra o Códigos de Procedencia:</td>
                            <td style="font-size:25px;">
                                <input type="text" class="form-control"  name="no_inv_obra" placeholder="No. de inventario de la Obra o Códigos de Procedencia" value="{{ old('no_inv_obra') }}" style="width:550px; font-size:18px;">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Características Descriptivas:</td>
                            <td style="font-size:25px;">
                                <input type="text" name="caract_descrip" class="form-control" placeholder="Características Descriptivas" value="{{ old('caract_descrip') }}" style="width:550px; font-size:18px;">
                            </td>
                        </tr>
                        <tr id="tempo">
                            <td style="font-size:25px;">Temporalidad:</td>
                            <td style="font-size:18px;">
                                <select type="text" name="temp_obra" id="temporalidadobra" onChange="temporal(this)" class="input-group-addon" placeholder="Temporalidad" value="{{ old('temp_obra') }}" style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una Opción</option>
                                    <option>Preclásico (2500 a.C - 200 d.C)</option>
                                    <option>Clásico (200 d.C - 900 d.C)</option>
                                    <option>Postclásico (900 d.C - 1521 d.C)</option>
                                    <option>Preclásico Tardío/Clásico Temprano </option>
                                    <option>Fase Teochitlán (450 - 650 d.C)</option>
                                    <option>Otro</option>
                                </select>
                                <input type="text" class="form-control" id="tempotro" name="temporalidadotro" placeholder="Otro" value="" style="width:550px; font-size:18px; display: none;">
                            </td>
                        </tr>
                        <tr id="año">
                            <td style="font-size:25px;">Año de la Obra:</td>
                            <td style="font-size:23px;">
                                <input type="text" name="año" class="form-control" placeholder="Año de la Obra" value="{{ old('año') }}" style="width:550px; font-size:18px;">
                            </td>
                        </tr>
                        <tr id="epoca">
                            <td style="font-size:25px;">Época de la Obra:</td>
                            <td style="font-size:25px;">
                                <select type="text" name="epoca_obra" id="epocadeobra" onChange="epocaobra(this)" class="input-group-addon" placeholder="Epoca de la Obra" value="{{ old('epoca_obra') }}" style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una Opción</option>
                                    <option>Siglo XIII</option>
                                    <option>Siglo XIV</option>
                                    <option>Siglo XV</option>
                                    <option>Siglo XVI</option>
                                    <option>Siglo XVII</option>
                                    <option>Siglo XVIII</option>
                                    <option>Siglo XIX</option>
                                    <option>Siglo XX</option>
                                    <option>Siglo XXI</option>
                                    <option>Otro</option>
                                </select>
                                <input type="text" class="form-control" id="epocaotro" name="epocaobraotro" placeholder="Otro" value="" style="width:550px; font-size:18px; display: none;">
                            </td>
                        </tr>
                        <tr id="añocon">
                            <td style="font-size:25px;">Año de la Obra Confirmado</td>
                            <td style="font-size:25px;">
                                <select class="input-group-addon" name="año_confirm" id="año_c" value="{{ old('año_confirm') }}"  style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una Opción</option>
                                    <option>si</option>
                                    <option>no</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="añoaprox">
                            <td style="font-size:25px;">Año de la Obra Aproximado:</td>
                            <td style="font-size:25px;">
                                <select class="input-group-addon" name="año_aproxi" value="{{ old('año_aproxi') }}" style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una opción</option>
                                    <option>si</option>
                                    <option>no</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="epocacon">
                            <td style="font-size:25px;">Época de la Obra Confirmada:</td>
                            <td>
                                <select class="input-group-addon" name="epoca_confirm" value="{{ old('epoca_confirm') }}" style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una opción</option>
                                    <option>si</option>
                                    <option>no</option>
                                </select>
                            </td>
                        </tr>
                        <tr id="epocaaprox">
                            <td style="font-size:25px;">Época de la Obra Aproximada:</td>
                            <td style="font-size:25px;">
                                <select class="input-group-addon" name="epoca_aproxi" value="{{ old('epoca_aproxi') }}" style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una opción</option>
                                    <option>si</option>
                                    <option>no</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <table style="width: 65%" border="0" align="center">
                        <tr >
                            <th colspan="5"style="text-align:center;background-color: #7C858C; color:white;"><h3>Información de indentificación</h3></th></tr>
                        <tr>
                            <td style="font-size:25px; width:550px;">Forma de Ingreso:</td>
                            <td style="font-size:25px;">
                                <select type="text" class="input-group-addon"  name="forma_ingreso" placeholder="Forma de Ingreso" value="{{ old('forma_ingreso') }}" style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una opción</option>
                                    <option>Interno</option>
                                    <option>Externo</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Área de la obra:</td>
                            <td>
                                <select class="input-group-addon" name="sector_obra" id="sectordeobra" onChange="sectorobra(this)" value="{{ old('sector_obra') }}" style="width:550px; font-size:18px;">
                                    <option value="" >Selecciona una opción</option>
                                    <option>Seminario Taller de Restauración de Cerámica</option>
                                    <option>Seminario Taller de Restauración de Pintura Mural</option>
                                    <option>Seminario Taller de Restauración de Pintura de Caballete</option>
                                    <option>Seminario Taller de Restauración de Escultura Policromada</option>
                                    <option>Seminario Taller de Restauración de Papel y Documentos Gráficos</option>
                                    <option>Seminario Taller de Restauración de Metales</option>
                                    <option>Práctica de Campo - Seminario Taller de Restauración de Cerámica</option>
                                    <option>Práctica de Campo - Seminario Taller de Restauración de Pintura Mural</option>
                                    <option>Práctica de Campo - Seminario Taller de Restauración de Pintura de Caballete</option>
                                    <option>Práctica de Campo - Seminario Taller de Restauración de Escultura Policromada</option>
                                    <option>Práctica de Campo - Seminario Taller de Restauración de Papel y Documentos Gráficos</option>
                                    <option>Práctica de Campo - Seminario Taller de Restauración de Metales</option>
                                    <option>Servicio Social - Seminario Taller de Restauración de Cerámica</option>
                                    <option>Servicio Social - Seminario Taller de Restauración de Pintura Mural</option>
                                    <option>Servicio Social - Seminario Taller de Restauración de Pintura de Caballete</option>
                                    <option>Servicio Social - Seminario Taller de Restauración de Escultura Policromada</option>
                                    <option>Servicio Social - Seminario Taller de Restauración de Papel y Documentos Gráficos</option>
                                    <option>Servicio Social - Seminario Taller de Restauración de Metales</option>
                                    <option>Donativo</option>
                                    <option>Laboratorio de Química</option>
                                    <option>Titulación</option>
                                    <option>Particulares</option>
                                    <option>Otro</option>
                                </select>
                                <input type="text" class="form-control" id="sectorotro" name="sectorobraotro" placeholder="Otro" value="" style="width:550px; font-size:18px; display: none;">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Responsable de la ECRO:</td>
                            <td style="font-size:25px;"><input type="text" class="form-control"  name="respon_ecro" placeholder="Responsable de la ECRO" value="{{ old('respon_ecro') }}" style="width:550px; font-size:18px;"></td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Fecha de Entrada:</td>
                            <td style="font-size:25px;">
                                <input type="date" class="form-control date" name="fecha_de_entrada" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ old('fecha_de_entrada') }}" style="width:550px; font-size:18px;">
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Nombre del Proyecto de la Obra:</td>
                            <td style="font-size:25px;"><input type="text" class="form-control"  name="proyecto_obra" placeholder="Nombre del Proyecto de la Obra" value="{{ old('proyecto_obra') }}" style="width:550px; font-size:18px;"></td>
                        </tr>
                        @permission('Captura_Registro_Avanzada_2')
                            <tr>
                                <td style="font-size:25px;">No. de Proyecto de la Obra:</td>
                                <td style="font-size:25px;"><input type="text" class="form-control" placeholder="No. de Proyecto de la Obra" name="no_proyec_obra"  value="{{ old('no_proyec_obra') }}" style="width:550px; font-size:18px;"></td>
                            </tr>
                        @endpermission
                        <tr>
                            <td style="font-size:25px;">Año de Temporada de Trabajo:</td>
                            <td id="inputaños" >
                              <input type="text" class="form-control" placeholder="Año de Temporada de Trabajo" name="anio0" value="{{ old('anio0') }}" style="width:450px; font-size:18px;">

                                <input type="button" id="otroaño" class="btn-sm" name="otroaño" value="Agregar más" onclick="javascript:masañostemp()">

                            </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Temporada de Trabajo:</td>
                            <td id="inputtemporadas">
                              <input type="text" class="form-control" placeholder="Temporada de Trabajo" name="temporada_trabajo0" value="{{ old('temporada_trabajo0') }}" style="width:450px; font-size:18px;">

                            <input type="button" id="otratemporada" class="btn-sm" name="otratemporada" value="Agregar más" onclick="javascript:mastemporadas()">

                          </td>
                        </tr>
                        <tr>
                            <td style="font-size:25px;">Fecha de Salida:</td>
                            <td><input type="date" class="form-control pull-right" name="fecha_de_salida" placeholder="mm/dd/aaaa (Fecha de salida)" value="{{ old('fecha_de_salida') }}" style="width:550px; font-size:18px;"></td>
                        </tr>
                    </table>
                    <br><br>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button  type="submit" class="btn btn-primary">Capturar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
