@extends('adminlte::layouts.app')
 <script src="js/jquery-3.2.1.js"></script>
    <script src="js/scrpt.jis"></script>
@section('main-content')
<div class="box">
    <div class="box-body"  >
            <div class="panel">

<style>
.invalid-feedback{
display:block;
}
</style>


   <section class="form_wrap" >

        <section class="cantact_info">
            <section class="info_title">
                <img  style="padding-left: 80px;" src="images/logo_usuario.png" width="180px"  />
                <h2>INFORMACION<br>DE CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> jose.bcarranza@academicos.udg.mx</p>

         

            @if (Session::has('flash_message'))
            <div class="alert alert-success">
                {{Session::get('flash_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            </section>
            </section>

        <form method="post" action="{{route('contact.store')}}" class="form_contact">
            <h2 style="text-align: center;">Envia un mensaje</h2>
            {{csrf_field()}}

                 
                <label for="names">Nombres *</label>
                <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control"required>
                @if ($errors->has('name'))
            <small class="form-text invalid-feedback">{{$errors->first('name')}}</small>
            @endif
  
                <label for="email">Correo electronico *</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                @if ($errors->has('email'))
            <small class="form-text invalid-feedback">{{$errors->first('email')}}</small>
            @endif
  
                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" class="form-control"  name="message"required></textarea>
                   @if ($errors->has('message'))
            <small class="form-text invalid-feedback">{{$errors->first('message')}}</small>
            @endif

           <input type="submit" value="Enviar Mensaje" id="btnSend">
            </div>
        </form>



    </section>

</div>

</div>
</div>
</div>



@endsection