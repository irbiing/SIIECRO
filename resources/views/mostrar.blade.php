@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Busqueda</div>

					<div class="panel-body">
						 <FORM method="post">
						 	<P>
						 		<div class="col-xs-3">
						 		<input type="text" class="form-control"  placeholder="No. de registro a buscar" id="no_re_obra"><BR>
						 		<button type="button" style='width:100px; height:35px' class="btn btn-block btn-primary">Buscar</button>
						 		</div><BR><BR><BR><BR><BR>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="No. de registro de la obra" id="no_re_obra"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Título de la obra/pieza" id="titulo"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Temporalidad" id="temporalidad"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Caracteristicas Descriptivas" id="carac_des"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Año" id="año"><BR>
						 		</div>

						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Confirmado" id="año_confir"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Aproximadamente" id="año_aprox"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Tipo de bien cultural" id="tipo_bien"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Epoca" id="epoca"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Confirmado" id="epoca_confir"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Aproximadamente" id="epoca_aprox"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Tipo de objeto" id="tipo_obj"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Lugar de Procedencia Original" id="lugar_ori"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Lugar de Procedencia Actual " id="lugar_act"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="No. de Inventario" id="no_inv"><BR>
						 		</div>
						 		
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Forma de Ingreso" id="forma"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Sector" id="sector"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Responsables ECRO" id="respon"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Proyecto" id="proyecto"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="No. de proyecto" id="no_proyec"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Año del Proyecto" id="año_proyec"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Temporada de Trabajo" id="temp_traba"><BR>
						 		</div><br>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Fecha de entrada" id="fecha_en"><BR>
						 		</div>
						 		<div class="col-xs-3">
						 			<input type="text" class="form-control" placeholder="Fecha de salida" id="fecha_sa"><BR>
						 		</div><br>
						 		
						 		
						 
						 		<!--<INPUT type="text" id="nombre"><BR> estos de aca es en donde se meten los datos, nada ams es copiar y pegar y cambiar el nombre de los campos
						 		<LABEL for="apellido">Apellido: </LABEL>
						 		<INPUT type="text" id="apellido"><BR>
						 		<LABEL for="email">email: </LABEL>
						 		<INPUT type="text" id="email"><BR>-->
						 		
						 		<!--<INPUT type="submit" style='width:100px; height:35px' class="btn btn-block btn-primary" value="Enviar"> este es wl boton para enviar, el tipo de boton es submit y el nombre que va a tener el boton se mete en value-->
						 	</P>
						 </FORM>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection