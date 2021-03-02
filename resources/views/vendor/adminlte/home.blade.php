<?php
$con = new mysqli("localhost","root","","siecrodb");
$sql ="SELECT COUNT(sector_obra), sector_obra FROM obras GROUP BY sector_obra";
$res = $con->query($sql);
?>
@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Inicio</div>

          <div class="panel-body">
            <strong> Bienvenido {{ Auth::user()->name }}</strong>
            <br><br>
              <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Grafica Pastel</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="Chart">
              <html>
  
  <head>  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    /*<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />*/
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
       
     var data = google.visualization.arrayToDataTable([
          ['ID', 'Sector de la obra'],
          <?php
          while($file = $res->fetch_assoc()){
            echo "['".$file["sector_obra"]."',".$file["COUNT(sector_obra)"]."],";
          }
  ?>
     ]);
        var options = {
          title: 'Registros de Obras Totales'
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 750px; height: 500px;"></div>
  </body>
</html>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection