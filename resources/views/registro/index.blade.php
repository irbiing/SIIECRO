@extends('adminlte::layouts.app')
 
@section('main-content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
<div class="box">
	<div class="box-body">
		<div class="panel">
			<h1>
			Registro de Análisis Científico
			{{ Form::open(['route' => 'registro.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
			<div class="form-group">
				<input  class="form-control" type="text" name="busqueda" placeholder="Titulo">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
			{{ Form::close() }}
			</h1>
		</div>
		<div style="overflow-x: auto; ">
			<div>
				<table id="tablaObras" class="table table-hover" role="grid" align="center">
					<thead >
        				<tr align="center" >
        					<th>Nomenclatura</th>
        					<th>Titulo de la Obra</th>
				            <th>Área</th>
				            <th>Caracterización de Tipo de Análisis</th>
				            <th>Interpretación Particular</th>
				            <th>Foto</th>
            				<th>Acción</th>
        				</tr>
       				</thead>
       				<tbody>
       					@foreach ($a_cientifico as $cienti)
       					<tr align="center">
       						<td>{{ $cienti->nomenclatura_muestra }}</td>
				            <td>{{ $cienti->titulo_obra }}</td>
				            <td></td>
				            <td>{{ $cienti->caracte_analisis }}</td>
				            <td>{{ $cienti->interpretacion_particular }}</td>
				            
                            @if($cienti->esquema == 'Sin imagen')
                            <td>Sin imagen</td>
                            @else
                            <td><a target="_blank" href="{{ "images/$cienti->esquema" }}"><img  width="200px" src="images/{{ $cienti->esquema }}" class="zoom"></a></td>
                            @endif
				            <td>
				            	<td><a href="{{ route('registro.show', $cienti->idcientifico) }}" class="btn btn-block btn-info btn-xs" style="width:70px;">Ver mas</a></td>
				            	
				            	<td><a href="{{ route('registro.editar', $cienti->idcientifico) }}" class="btn btn-block btn-warning btn-xs" style="width:70px;">Editar</a></td>
				            	<td><a href="javascript: document.getElementById('delete-{{ $cienti->idcientifico }}').submit()" class="btn btn-block btn-danger btn-xs" onclick="return confirm('¿Seguro que deseas eliminarlo?')" style="width:70px;">Eliminar</a></td>
				            	
				            	<form id="delete-{{ $cienti->idcientifico }}" action="{{ route('registro.destroy', $cienti->idcientifico) }}" method="POST">
		                    	@method('delete')
		 						@csrf
                			</form>
            				</td>
        				</tr>
          				@endforeach
    				</tbody>
    			</table>
                <div align="center">
                	{!!$a_cientifico->links()!!}  
                </div>
			</div>
		</div>				 	
  	</div>
</div>
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endsection