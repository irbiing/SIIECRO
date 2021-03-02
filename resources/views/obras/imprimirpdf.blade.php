<style> p.saltodepagina
 {
 page-break-after: always;
 }
 </style>


<div class="box">
    <div class="box-body"  >
        <div class="panel">
        <img  width="200px" src="images/Logotipo_ECRO_Gris.png" >
            <h1 align="center">Datos de Registro de la Obra</h1>
@if ($errors->any())
<br>
    <div class="alert alert-danger">
        <strong>Vaya!</strong> Parece que algo hiciste mal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('Obras.actualizar', $obra->id) }}" method="POST" class="form-inline text-left">
    @csrf
  
   
    <table style="width: 100%" border="0" align="center" cellspacing="4" cellpadding="4">
<tr ><th colspan="5"style="text-align:center;background-color: #7C858C; color:white;"><h3>Datos Generales</h3></th></tr>

@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2'])
@if($obra->id_de_obras != NULL)
  <tr>
    <td style="font-size:20px;">ID de Obra:</td>
    <td style="font-size:20px;">{{ $obra->id_de_obras }}</td>
  </tr>@endif  <br><br><br><br>
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2','Consulta_Externa'])
<tr>
  <td style="font-size:20px;">Título de la Obra:</td>
    <td style="font-size:20px;">{{ $obra->titulo_obra }}</td>
</tr>
@if($obra->autor != NULL)
<tr>
  <td style="font-size:20px;">Autor:</td>
  <td style="font-size:20px;">{{ $obra->autor }}</td>
</tr>
@endif
@if($obra->cultura != NULL)
<tr>
  <td style="font-size:20px;">Cultura:</td>
  <td style="font-size:20px;">{{ $obra->cultura }}</td>
</tr>
@endif
<tr>
  <td style="font-size:20px;">Tipo de Bien Cultural:</td>
  <td style="font-size:20px;">{{ $obra->tipo_bien_cultu }}</td>
</tr>

<tr>
  <td style="font-size:20px;">Tipo de Objeto de la Obra:</td>
  <td style="font-size:20px;">{{ $obra->tipo_obj_obra }}</td>
</tr>
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2'])
<tr>
  <td style="font-size:20px;">Lugar de Procedencia Actual:</td>
  <td style="font-size:20px;">{{ $obra->lugar_proce_act }}</td>
</tr>
@endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:20px;">Lugar de Procedencia Original:</td>
  <td style="font-size:20px;">{{ $obra->lugar_proce_ori }}</td>
</tr>
<tr>
    <td style="font-size:20px;">No. de inventario de la Obra o Códigos de Procedencia:</td>
    <td style="font-size:20px;">{{ $obra->no_inv_obra }}</td>
  </tr>
  @endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2'])
<tr>
  <td style="font-size:20px;">Características Descriptivas:</td>
  <td style="font-size:20px;">{{ $obra->caract_descrip }}</td>
</tr>
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2','Consulta_Externa'])
<tr>
  <td style="font-size:20px;">Temporalidad:</td>
  <td style="font-size:20px;">{{$obra->temp_obra}}</td>
</tr>
@if($obra->año != NULL)
<tr>
  <td style="font-size:20px;">Año de la Obra:</td>
  <td style="font-size:20px;">{{ $obra->año }}</td>
</tr>
@endif
@if($obra->epoca_obra != NULL)
<tr>
  <td style="font-size:20px;">Época de la Obra:</td>
  <td style="font-size:20px;">{{ $obra->epoca_obra }}</td>
</tr>
@endif
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2'])
@if($obra->año_confirm != NULL)
<tr>
  <td style="font-size:20px;">Año de la Obra Confirmado</td>
  <td style="font-size:20px;">{{ $obra->año_confirm }}</td>
</tr>
@endif
@if($obra->año_aproxi != NULL)
<tr>
  <td style="font-size:20px;">Año de la Obra Aproximado:</td>
  <td style="font-size:20px;">{{ $obra->año_aproxi }}</td>
</tr>
@endif
@if($obra->epoca_confirm != NULL)
<tr>
  <td style="font-size:20px;">Época de la Obra Confirmada:</td>
  <td style="font-size:20px;">{{ $obra->epoca_confirm }}</td>
</tr>
@endif
@if($obra->epoca_aproxi != NULL)
<tr>
  <td style="font-size:20px;">Época de la Obra Aproximada:</td>
  <td style="font-size:20px;">{{ $obra->epoca_aproxi }}</td>
</tr>
@endif
@endpermission
</table>
<p class="saltodepagina" />
<img  width="200px" src="images/Logotipo_ECRO_Gris.png" >
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2'])



<table style="width:100%" border="0" align="center" cellspacing="6" cellpadding="6">
<tr ><th colspan="1"style="text-align:center;background-color: #7C858C; color:white;"><h3>Información de indentificación</h3></th></tr>
</table>
<table style="width:100%" border="0" align="center" cellspacing="6" cellpadding="6">

  @endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:20px; width:52%;">Forma de Ingreso:</td>
    <td style="font-size:20px;">{{ $obra->forma_ingreso }}</td>
</tr>
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2'])
<tr>
  <td style="font-size:20px;">Sector:</td>
  <td style="font-size:20px;">{{ $obra->sector_obra }}</td>
</tr>
@endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:20px;">Responsable de la ECRO:</td>
  <td style="font-size:20px;">{{ $obra->respon_ecro }}</td>
</tr>
<tr>
  <td style="font-size:20px;">Fecha de Entrada:</td>
  <td style="font-size:20px;">{{ $obra->fecha_de_entrada }}</td>
</tr>
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2'])
<tr>
  <td style="font-size:20px;">Nombre del Proyecto de la Obra:</td>
  <td style="font-size:20px;">{{ $obra->proyecto_obra }}</td>
</tr>
@endpermission
@permission('Consulta_General_Avanzada_2')
<tr>
  <td style="font-size:20px;">No. de Proyecto de la Obra:</td>
  <td style="font-size:20px;">{{ $obra->no_proyec_obra }}</td>
</tr>
@endpermission
@permission(['Consulta_General_Basica','Consulta_General_Avanzada_2'])
<tr>
<td style="font-size:20px;">Año de Temporada de Trabajo:</td>
  <td style="font-size:20px;">{{ $obra->año_trabajo_obra }}</td>
</tr>
<tr>
    <td style="font-size:20px;">Temporada de Trabajo:</td>
  <td style="font-size:20px;">{{ $obra->temporada_trabajo }}</td>
</tr>
@endpermission
@permission(['Consulta_General_Avanzada_2'])
<tr>
  <td style="font-size:20px;">Fecha de Salida:</td>
  <td style="font-size:20px;">{{ $obra->fecha_de_salida }}</td>
</tr>
@endpermission


</table><br><br><br><br><br>
      
      
   
</form>
                            
  

   

</div>
                </div>
            </div>
        </div>
    </div>