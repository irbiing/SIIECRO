@extends('adminlte::layouts.app')
 
@section('main-content')
 <div align="center">
<div class="box" style="width: 500px">
	<div class="box-body" style="width: 500px">	
		<div  align="center">
      @if(Auth::user()->foto_perfil == NULL)
			  <img style="width: 200px; " src="/images/default.png" class="img-circle"  >
      
      @endif		
    </div><br>
		<div align="center">
			<form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" value="{{ Auth::user()->email }}" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" value="{{ Auth::user()->name }}" placeholder="Password">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
            
                <button type="submit" class="btn btn-info pull-right">Editar</button>
              </div>
              <!-- /.box-footer -->
            </form>
			
			
		</div>
	</div>
</div>
</div>
@endsection