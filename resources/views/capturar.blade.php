@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

<div class="box">
    <div class="box-body"  >
            <div class="panel">
                <h1>Registrar Obra</h1>
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
                    <div class="form-group">
                        <div class="form-group">
                            <div class="input-group" >
                                <label for="id" class="input-group-addon">ID</label>
                                <input type="text" name="id" class="form-control"  value="{{ old('id') }}" style="width:200px"><BR>    
                            </div> 
                            <div class="input-group" >
                                <label for="titulo_obra" class="input-group-addon">Titulo de la obra/pieza</label>
                                <input type="text" name="titulo_obra" class="form-control"  value="{{ old('titulo_obra') }}" style="width:200px">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">Temporalidad</span>
                                <input type="text" name="temp_obra" class="form-control"  value="{{ old('temp_obra') }}" style="width:200px">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <div class="input-group ">
                                <label for="caract_descrip" class="input-group-addon">Caracteristicas descriptivas</label>
                                <input type="text" name="caract_descrip" class="form-control"  value="{{ old('caract_descrip') }}" style="width:200px">
                            </div>
                            <div class="input-group ">
                                <label for="año" class="input-group-addon">Año</label>
                                <input type="text" name="año" class="form-control"  value="{{ old('año') }}" style="width:200px">
                            </div>
                            <div class="input-group ">
                                <label for="epoca_obra" class="input-group-addon">Epoca de la obra</label>
                                <input type="text" name="epoca_obra" class="form-control"  value="{{ old('epoca_obra') }}" style="width:200px">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <div class="input-group ">
                                <label for="tipo_bien_cultu" class="input-group-addon">Tipo de bien cultural</label>
                                <input type="text" name="tipo_bien_cultu" class="form-control"  value="{{ old('tipo_bien_cultu') }}" style="width:200px">
                            </div>    
                            <div class="input-group">
                                <label for="tipo_obj_obra" class="input-group-addon">Tipo de objeto de la obra</label>
                                <input type="text" name="tipo_obj_obra" class="form-control"  value="{{ old('tipo_obj_obra') }}" style="width:200px">
                            </div>
                            <div class="input-group">
                                <label for="lugar_proce_ori" class="input-group-addon">Lugar de procedencia original</label>
                                <input type="text" class="form-control"  name="lugar_proce_ori"  value="{{ old('lugar_proce_ori') }}" style="width:200px">
                            </div>
                        </div><br><br>
                    <div class="form-group">
                    <div class="input-group">
                        <label for="lugar_proce_act" class="input-group-addon">Lugar de procedencia actual</label>
                        <input type="text" class="form-control"  name="lugar_proce_act"  value="{{ old('lugar_proce_act') }}" style="width:200px">
                    </div>

           
                    <div class="input-group">
                        <label for="no_inv_obra" class="input-group-addon">Numero de inventario de la obra</label>
                        <input type="text" class="form-control"  name="no_inv_obra"  value="{{ old('no_inv_obra') }}" style="width:200px">
                    </div>

              
                    <div class="input-group">
                        <label for="forma_ingreso" class="input-group-addon">Forma de ingreso</label>
                        <input type="text" class="form-control"  name="forma_ingreso"  value="{{ old('forma_ingreso') }}" style="width:200px">
                    </div></div><br><br>
             
                    <div class="form-group">
                    <div class="input-group">
                        <label for="sector_obra" class="input-group-addon">Sector de la obra</label>
                        <input type="text" class="form-control"  name="sector_obra"  value="{{ old('sector_obra') }}" style="width:200px">
                    </div>
              
                    
                    <div class="input-group">
                        <label for="respon_ecro" class="input-group-addon">Responsable de la ECRO</label>
                        <input type="text" class="form-control"  name="respon_ecro"  value="{{ old('respon_ecro') }}" style="width:200px">
                    </div>
       
            
                    <div class="input-group">
                        <label for="proyecto_obra" class="input-group-addon">Proyecto de la obra</label>
                        <input type="text" class="form-control"  name="proyecto_obra"  value="{{ old('proyecto_obra') }}" style="width:200px">
                    </div></div><br><br>
           
                      
                    <div class="input-group">
                        <label for="año_proyec_obra" class="input-group-addon">Año de proyecto de la obra</label>
                        <input type="text" class="form-control"  name="año_proyec_obra" value="{{ old('año_proyec_obra') }}" style="width:200px">
                    </div>
                    <div class="input-group">
                        <label for="temporada_trabajo" class="input-group-addon">Temporada de trabajo</label>
                        <input type="text" class="form-control"  name="temporada_trabajo" value="{{ old('temporada_trabajo') }}" style="width:200px">
                    </div>
            
               
                    <div class="input-group">
                        <label for="no_proyec_obra" class="input-group-addon">No. de proyecto de la obra</label>
                        <input type="text" class="form-control"  name="no_proyec_obra"  value="{{ old('no_proyec_obra') }}" style="width:200px">
                    </div><br><br>
                    <div class="form-group">
                        <label for="año_c" class="input-group">Año confirmado</label> 
                        <select class="input-group-addon" name="año_confirm" id="año_c" value="{{ old('año_confirm') }}"  style="width:200px">
                            <option value="" >Selecciona una opcion</option>
                            <option>si</option>
                            <option>no</option>
                      </select><br>
                    
                        <label for="año_aproxi" class="input-group">Año aproximado</label> 
                        <select class="input-group-addon" name="año_aproxi" value="{{ old('año_aproxi') }}" style="width:200px">
                            <option value="" >Selecciona una opcion</option>
                            <option>si</option>
                            <option>no</option>
                      </select><br>
                   
                        <label for="epoca_confirm" class="input-group">Epoca confirmada</label>  
                        <select class="input-group-addon" name="epoca_confirm" value="{{ old('epoca_confirm') }}" style="width:200px">
                            <option value="" >Selecciona una opcion</option>
                            <option>si</option>
                            <option>no</option>
                      </select><br>
                    
                        <label for="epoca_aproxi" class="input-group">Epoca aproximada</label> 
                        <select class="input-group-addon" name="epoca_aproxi" value="{{ old('epoca_aproxi') }}" style="width:200px">
                            <option value="" >Selecciona una opcion</option>
                            <option>si</option>
                            <option>no</option>
                      </select>
                    </div><br><br>
                    <div class="col-xs-3">
                    <div class="input-group date">

                        <div class="input-group-addon">
                             <i class="fa fa-calendar"> Fecha de entrada</i>

                        </div>

                        <input type="date" class="form-control date" name="fecha_de_entrada" placeholder="mm/dd/aaaa (Fecha de entrada)" value="{{ old('fecha_de_entrada') }}" style="width:262px">
                    </div>
                    <br><br>
                    <div class="input-group date">
                        <div class="input-group-addon">
                             <i class="fa fa-calendar"> Fecha de salida  </i>
                        </div>
                        <input type="date" class="form-control pull-right" name="fecha_de_salida" placeholder="mm/dd/aaaa (Fecha de salida)" value="{{ old('fecha_de_salida') }}" style="width:262px">
                    
                    </div>
                    </div><br>
  
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button  type="submit" class="btn btn-primary">Capturar</button>
                    </div>
                </form>
        </div>
	</div>
</div>
@endsection