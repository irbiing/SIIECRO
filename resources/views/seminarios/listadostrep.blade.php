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
			Solicitud de Análisis Científico
			{{ Form::open(['route' => 'analisisg.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
			<div class="form-group">
				<input  class="form-control" type="text" name="id_obra" placeholder="ID">
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
        					<th>ID Obra</th>
        					<th>Titulo de la Obra</th>
        					<th>Año</th>
        					<th>Epoca de la Obra</th>
				            <th>Temporalidad</th>
				            <th>Área</th>
				            <th>responsable de la Intervencion</th>
				            <th>Año de temporada de trabajo</th>
                            <th>Foto</th>
            				<th>Acción</th>
        				</tr>
       				</thead>
       				<tbody>
       					@foreach ($Analisisg as $analisg)
       					@if($analisg->sector_obra == 'Seminario Taller de Restauración de Escultura Policromada' || $analisg->sector_obra == 'Servicio Social - Seminario Taller de Restauración de Escultura Policromada' || $analisg->sector_obra == 'Práctica de Campo - Seminario Taller de Restauración de Escultura Policromada' )
       					<tr align="center">
       						<td>{{ $analisg->id_de_obra }}</td>
				            <td>{{ $analisg->titulo_obra }}</td>
				            <td>{{ $analisg->año }}</td>
				            <td>{{ $analisg->epoca_obra }}</td>
				            <td>{{ $analisg->temp_obra }}</td>
				            <td>{{ $analisg->sector_obra }}</td>
				            <td>{{ $analisg->respon_intervencion }}</td>
				            <td>{{ $analisg->anio_temporada_trabajo }}</td>
                           
                            @if($analisg->foto == 'Sin imagen')
                            <td>Sin imagen</td>
                            @else
                            <td><a target="_blank" href="{{ "images/$analisg->foto" }}"><img  width="200px" src="images/{{ $analisg->foto }}" class="zoom"></a></td>
                            @endif
				            <td>
				            	<td><a href="{{ route('analisisg.show', $analisg->id_general) }}" class="btn btn-block btn-info btn-xs" style="width:70px;">Ver mas</a></td>
				            	
				            	<td><a href="{{ route('analisisg.editar', $analisg->id_general) }}" class="btn btn-block btn-warning btn-xs" style="width:70px;">Editar</a>
				            		
				            	</td>
				            	
				            	
				            	<td><form id="delete-{{ $analisg->id_general }}" action="{{ route('analisisg.destroy', $analisg->id_general) }}" method="POST">
				            			<a href="javascript:document.getElementById('delete-{{ $analisg->id_general }}').submit()" class="btn btn-block btn-danger btn-xs" onclick="return confirm('¿Seguro que deseas eliminarlo?')" style="width:70px;">Eliminar</a>
		                    	@method('delete')
		 						@csrf
                			</form></td>
				            	
				            	<td><a href="{{ route('registro.create', $analisg->id_general) }}" class="btn btn-block btn-success btn-xs" >Agregar registro</a></td>

								<td><a target="_blank" href="{{ route('analisisgeneral.pdf', $analisg->id_general) }}" class="btn btn-block btn-success btn-xs" style="width:90px;">Imprimir</a></td>
				            	
				            	<form id="delete-{{ $analisg->id_general }}" action="{{ route('analisisg.destroy', $analisg->id_general) }}" method="POST">
		                    	@method('delete')
		 						@csrf
                			</form>
            				</td>
        				</tr>
        				@endif
          				@endforeach
    				</tbody>
    			</table>
                <div align="center">
                	{!!$Analisisg->links()!!}  
                </div>
			</div>
		</div>				 	
  	</div>
</div>
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endsection