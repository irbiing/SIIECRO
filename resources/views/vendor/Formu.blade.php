@extends('adminlte::layouts.app')
  
@section('main-content')

   <div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">

					<div class="panel-heading">Agregar</div>

					<div class="panel-body">
						 
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Vaya!</strong> Parece que algo hiciste mal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('Obras.index') }}" method="PUT">
    @csrf
  @method('PUT')
     <BR>
            <div class="col-xs-3">
                <input type="text" name="id"  class="form-control" placeholder="ID"><BR>
            </div> 
            <div class="col-xs-3">
                <input type="text" name="titulo_obra" class="form-control" placeholder="Titulo de la obra/pieza"><BR>
            </div>
        
          
            <div class="col-xs-3">
                <input type="text" name="temp_obra" class="form-control" placeholder="Temporada de la obra"><BR>
            </div>
        
         
            <div class="col-xs-3">
                <input type="text" name="caract_descrip" class="form-control" placeholder="Caracteristicas Descriptivas"><BR>
            </div>
    
          
            <div class="col-xs-3">
                <input type="text" name="año" class="form-control" placeholder="Año"><BR>
            </div>
      
         
            <div class="col-xs-3">
                <input type="text" name="año_confirm" class="form-control" placeholder="Año confirmado"><BR>
            </div>
 
          
            <div class="col-xs-3">
                <input type="text" name="año_aproxi" class="form-control" placeholder="Año aproximado"><BR>
            </div>
     
         
            <div class="col-xs-3">
                <input type="text" name="epoca_obra" class="form-control" placeholder="Epoca de la obra"><BR>
            </div>
    
         
            <div class="col-xs-3">
                <input type="text" name="epoca_confirm" class="form-control" placeholder="Epoca confirmada"><BR>
            </div>
      
         
            <div class="col-xs-3">
                <input type="text" name="epoca_aproxi" class="form-control" placeholder="Epoca Aprximada"><BR>
            </div>
      

         
            <div class="col-xs-3">
                <input type="text" name="tipo_bien_cultu" class="form-control" placeholder="Tipo de bien cultural"><BR>
            </div>
  
          
            <div class="col-xs-3">
                <input type="text" name="tipo_obj_obra" class="form-control" placeholder="Tipo de objeto de la obra"><BR>
            </div>
    
     
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="lugar_proce_ori" placeholder="Lugar de procedencia original"><BR>
            </div>
  
      
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="lugar_proce_act" placeholder="Lugar de procedencia actual"><BR>
            </div>

       
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="no_inv_obra" placeholder="No. de iventario de la obra"><BR>
            </div>

      
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="forma_ingreso" placeholder="Forma de ingreso"><BR>
            </div>
     
        
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="sector_obra" placeholder="Sector de la obra"><BR>
            </div>
      
        
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="respon_ecro" placeholder="Responsable de la ECRO"><BR>
            </div>
   
        
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="proyecto_obra" placeholder="Proyecto de la obra"><BR>
            </div>
   
      
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="año_proyec_obra" placeholder="Año proyecto de la obra"><BR>
            </div>
    
       
            <div class="col-xs-3">
                <input type="text" class="form-control"  name="no_proyec_obra" placeholder="No. de proyecto de la obra"><BR>
            </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button  type="submit" class="btn btn-primary">Capturar</button>
        </div>
    
   
</form>
				
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection