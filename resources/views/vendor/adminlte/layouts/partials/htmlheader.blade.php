<head>
    <meta charset="UTF-8">
    <title> SIIECRO  </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script>
        $(document).ready(function(){
            $('.zoom').hover(function() {
                $(this).addClass('transition');
            }, function() {
                $(this).removeClass('transition');
            });
        });
    </script>
    <!--  HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- <script type="text/javascript">

        $(".validar_form").submit(function () {
            element = document.getElementById("cultura");
    var select = $("#tipo_bien_cultu").val();
    if (select == 'Arqueológico') {
        $element.style.display='block';
    } else {
        element.style.display='none';
    }
    });
    </script>
        <script type="text/javascript">
        function showAño() {
            element = document.getElementById("cultura");
            tipo_bien_cultu = document.getElementById("tipo_bien_cultu");
            if (tipo_bien_cultu == 'Arqueológico') {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
    </script> -->


    <script type="text/javascript">
     //JS PARA MOSTRAR U OCULTAR DIFERENTES ATRIBUTOS EN LA VISTA
        function tipodebien(sel) {
            if (sel.value=="Arqueológico") {
                $("#cultura").show();
                $("#tempo").show();
                $("#autor").hide();
                $("#año").hide();
                $("#epoca").hide();
                $("#añocon").hide();
                $("#epocacon").hide();
                $("#añoaprox").hide();
                $("#epocaaprox").hide();
                tbcotro.style.display='none';
                tipo_bien_cultural.style.display='block';

            } else if (sel.value=="Otro") {
                tbcotro.style.display='block';
                tipo_bien_cultural.style.display='none';
            } else {
                $("#año").show();
                $("#epoca").show();
                $("#tempo").hide();
                $("#cultura").hide();
                $("#autor").show();
                $("#añocon").show();
                $("#epocacon").show();
                $("#añoaprox").show();
                $("#epocaaprox").show();
                tbcotro.style.display='none';
                tipo_bien_cultural.style.display='block';
            }
        }

//JS PARA MOSTRAR U OCULTAR DIFERENTES ATRIBUTOS EN LA VISTA/
        function tipodeobjeto(sel) {
            if (sel.value=="Otro") {
                tdootro.style.display='block';
                tipoobjeto.style.display='none';
            } else {
                tdootro.style.display='none';
                tipoobjeto.style.display='block';
            }
        }
//JS PARA MOSTRAR U OCULTAR DIFERENTES ATRIBUTOS EN LA VISTA/
        function temporal(sel) {
            if (sel.value=="Otro") {
                tempotro.style.display='block';
                temporalidadobra.style.display='none';
            } else {
                tempotro.style.display='none';
                temporalidadobra.style.display='block';
            }
        }
//JS PARA MOSTRAR U OCULTAR DIFERENTES ATRIBUTOS EN LA VISTA/
        function epocaobra(sel) {
            if (sel.value=="Otro") {
                epocaotro.style.display='block';
                epocadeobra.style.display='none';
            } else {
                epocaotro.style.display='none';
                epocadeobra.style.display='block';
            }
        }
//JS PARA MOSTRAR U OCULTAR DIFERENTES ATRIBUTOS EN LA VISTA/
        function sectorobra(sel) {
            if (sel.value=="Otro") {
                sectorotro.style.display='block';
                sectordeobra.style.display='none';
            } else {
                sectorotro.style.display='none';
                sectordeobra.style.display='block';
            }
        }
//JS PARA LOS METODOS RECURSIVO DE MOSTRAR MAS CAMPOS EN LAS VISTAS CON EL BOTON "AGREGAR MAS"/
        window.contadoraños = 1
        function masañostemp() {
            var inputaños = `<br><input type="text" class="form-control"  name="anio${window.contadoraños}" placeholder="Año de Temporada de Trabajo" value="" style=" width:450px; font-size:18px; ">`
            $('#inputaños').append(inputaños)
            window.contadoraños += 1;
        }

        window.contatemporadas = 1
        function mastemporadas() {
            var inputtemporadas = `<br><input type="text" class="form-control" placeholder="Temporada de Trabajo" name="temporada_trabajo${window.contatemporadas}" value="" style="width:450px; font-size:18px;">`
            $('#inputtemporadas').append(inputtemporadas)
            window.contatemporadas += 1;
        }
        
        //SOPORTE I
        window.contasoporte = 1
        function massoporte() {
            var inputsoporte = `<table class="table table-bordered"  background-color: red;><strong>I.SOPORTE</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #C65911; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #C65911; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #C65911; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #C65911; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="Smuestra${window.contasoporte}" style="width:300px"></td>
                                <td><input type="text" name="Snomenclatura${window.contasoporte}" style="width:300px"></td>
                                <td><input type="text" name="Sinf_requerida${window.contasoporte}" style="width:300px"></td>
                                <td><input type="text" name="Sdes_muestra${window.contasoporte}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #C65911; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #C65911; color:white; width:300px">Responsable</th>
                                <th style="background-color: #C65911; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Subicacion${window.contasoporte}" style="width:300px"></td>
                                <td><input type="text" name="Sresponsable${window.contasoporte}" style="width:300px"></td>
                                <td><input type="text" name="Siden_muestra${window.contasoporte}" style="width:300px"></td>


                            </tr>



                        </tbody>


                    </table>`
            $('#inputsoporte').append(inputsoporte)
            window.contasoporte += 1;
        }

        //BASE DE PREPARACION II
        window.contabase = 1
        function masbase() {
            var inputbase = `<table class="table table-bordered"  background-color: red;><strong>II.BASE DE PREPARACIóN</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FFCC66; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="BPmuestra${window.contabase}" style="width:300px"></td>
                                <td><input type="text" name="BPnomenclatura${window.contabase}" style="width:300px"></td>
                                <td><input type="text" name="BPinf_requerida${window.contabase}" style="width:300px"></td>
                                <td><input type="text" name="BPdes_muestra${window.contabase}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #FFCC66; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">Responsable</th>
                                <th style="background-color: #FFCC66; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BPubicacion${window.contabase}" style="width:300px"></td>
                                <td><input type="text" name="BPresponsable${window.contabase}" style="width:300px"></td>
                                <td><input type="text" name="BPiden_muestra${window.contabase}" style="width:300px"></td>


                            </tr>



                        </tbody>


                    </table>`
            $('#inputbase').append(inputbase)
            window.contabase += 1;
        }


        //ESTRATIGRAFIA III
        window.contaestratigrafia = 1
        function masestratigrafia() {
         var inputestratigrafia = `<table class="table table-bordered"  background-color: red;><strong>III. ESTRATIGRAFíA</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #008000; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #008000; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #008000; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #008000; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="Emuestra${window.contaestratigrafia}" style="width:300px"></td>
                                <td><input type="text" name="Enomenclatura${window.contaestratigrafia}" style="width:300px"></td>
                                <td><input type="text" name="Einf_requerida${window.contaestratigrafia}" style="width:300px"></td>
                                <td><input type="text" name="Edes_muestra${window.contaestratigrafia}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #008000; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #008000; color:white; width:300px">Responsable</th>
                                <th style="background-color: #008000; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Eubicacion${window.contaestratigrafia}" style="width:300px"></td>
                                <td><input type="text" name="Eresponsable${window.contaestratigrafia}" style="width:300px"></td>
                                <td><input type="text" name="Eiden_muestra${window.contaestratigrafia}" style="width:300px"></td>
                                

                            </tr>

                    

                        </tbody>
                        

                    </table>`
      $('#inputestratigrafia').append(inputestratigrafia)
      window.contaestratigrafia += 1;
  }

        //REVOQUE Y ENLUCIDO IV
        window.contarevoque = 1
        function masrevoque() {
        var inputrevoque = `<table class="table table-bordered"  background-color: red;><strong>IV. REVOQUE Y ENLUCIDO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #B248A5; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #B248A5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="REmuestra${window.contarevoque}" style="width:300px"></td>
                                <td><input type="text" name="REnomenclatura${window.contarevoque}" style="width:300px"></td>
                                <td><input type="text" name="REinf_requerida${window.contarevoque}" style="width:300px"></td>
                                <td><input type="text" name="REdes_muestra${window.contarevoque}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #B248A5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #B248A5; color:white; width:300px">Responsable</th>
                                <th style="background-color: #B248A5; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="REubicacion${window.contarevoque}" style="width:300px"></td>
                                <td><input type="text" name="REresponsable${window.contarevoque}" style="width:300px"></td>
                                <td><input type="text" name="REiden_muestra${window.contarevoque}" style="width:300px"></td>
                                

                            </tr>

                    

                        </tbody>
                        

                    </table>`
                    $('#inputrevoque').append(inputrevoque)
                    window.contarevoque += 1;
                }

                // BOL V
                window.contabol = 1
                function masbol() {
            var inputbol = `<table class="table table-bordered"><strong>VI. BOL</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FF5050; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #FF5050; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="BOLmuestra${window.contabol}" style="width:300px"></td>
                                <td><input type="text" name="BOLnomenclatura${window.contabol}" style="width:300px"></td>
                                <td><input type="text" name="BOLinf_requerida${window.contabol}" style="width:300px"></td>
                                <td><input type="text" name="BOLdes_muestra${window.contabol}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #FF5050; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FF5050; color:white; width:300px">Responsable</th>
                                <th style="background-color: #FF5050; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BOLubicacion${window.contabol}" style="width:300px"></td>
                                <td><input type="text" name="BOLresponsable${window.contabol}" style="width:300px"></td>
                                <td><input type="text" name="BOLiden_muestra${window.contabol}" style="width:300px"></td>
                            </tr>
                        </tbody>
                  </table>`
                $('#inputbol').append(inputbol)
                 window.contabol += 1;
                }

                //LAMINAS METALICAS VI
                window.contalaminas = 1
                function maslaminas() {
                var inputlaminas = `<table class="table table-bordered"><strong>VII. LÁMINAS METÁLICAS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #3A5754; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #3A5754; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="LMmuestra${window.contalaminas}" style="width:300px"></td>
                                <td><input type="text" name="LMnomenclatura${window.contalaminas}" style="width:300px"></td>
                                <td><input type="text" name="LMinf_requerida${window.contalaminas}" style="width:300px"></td>
                                <td><input type="text" name="LMdes_muestra${window.contalaminas}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #3A5754; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #3A5754; color:white; width:300px">Responsable</th>
                                <th style="background-color: #3A5754; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="LMubicacion${window.contalaminas}" style="width:300px"></td>
                                <td><input type="text" name="LMresponsable${window.contalaminas}" style="width:300px"></td>
                                <td><input type="text" name="LMiden_muestra${window.contalaminas}" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>`
                    $('#inputlaminas').append(inputlaminas)
                    window.contalaminas += 1;
                     }

  //PIGMENTOS VII
  window.contapigmentos = 1
  function maspigmentos() {
      var inputpigmentos = `<table class="table table-bordered"><strong>VIII.PIGMENTOS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #5B9BD5; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="Pmuestra${window.contapigmentos}" style="width:300px"></td>
                                <td><input type="text" name="Pnomenclatura${window.contapigmentos}" style="width:300px"></td>
                                <td><input type="text" name="Pinf_requerida${window.contapigmentos}" style="width:300px"></td>
                                <td><input type="text" name="Pdes_muestra${window.contapigmentos}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">Responsable</th>
                                <th style="background-color: #5B9BD5; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Pubicacion${window.contapigmentos}" style="width:300px"></td>
                                <td><input type="text" name="Presponsable${window.contapigmentos}" style="width:300px"></td>
                                <td><input type="text" name="Piden_muestra${window.contapigmentos}" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>`
      $('#inputpigmentos').append(inputpigmentos)
      window.contapigmentos += 1;
  }

  //AGLUTINANTES VIII
  window.contaaglutinante = 1
  function masaglutinante() {
      var inputaglutinante = `<table class="table table-bordered"><strong>IX.AGLUTINANTES</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #F55587; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #F55587; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #F55587; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #F55587; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="Amuestra${window.contaaglutinante}" style="width:300px"></td>
                                <td><input type="text" name="Anomenclatura${window.contaaglutinante}" style="width:300px"></td>
                                <td><input type="text" name="Ainf_requerida${window.contaaglutinante}" style="width:300px"></td>
                                <td><input type="text" name="Ades_muestra${window.contaaglutinante}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #F55587; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #F55587; color:white; width:300px">Responsable</th>
                                <th style="background-color: #F55587; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Aubicacion${window.contaaglutinante}" style="width:300px"></td>
                                <td><input type="text" name="Aresponsable${window.contaaglutinante}" style="width:300px"></td>
                                <td><input type="text" name="Aiden_muestra${window.contaaglutinante}" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>`
      $('#inputaglutinante').append(inputaglutinante)
      window.contaaglutinante += 1;
  }

  // RECUBRIMIENTO IX
   window.contarecubrimiento = 1
  function masrecubrimiento() {
      var inputrecubrimiento = `<table class="table table-bordered"><strong>X. RECUBRIMIENTOS</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #FBAE47; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="Rmuestra${window.contarecubrimiento}" style="width:300px"></td>
                                <td><input type="text" name="Rnomenclatura${window.contarecubrimiento}" style="width:300px"></td>
                                <td><input type="text" name="Rinf_requerida${window.contarecubrimiento}" style="width:300px"></td>
                                <td><input type="text" name="Rdes_muestra${window.contarecubrimiento}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #FBAE47; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">Responsable</th>
                                <th style="background-color: #FBAE47; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="Rubicacion${window.contarecubrimiento}" style="width:300px"></td>
                                <td><input type="text" name="Rresponsable${window.contarecubrimiento}" style="width:300px"></td>
                                <td><input type="text" name="Riden_muestra${window.contarecubrimiento}" style="width:300px"></td>
                            </tr>
                        </tbody>
                    </table>`
      $('#inputrecubrimiento').append(inputrecubrimiento)
      window.contarecubrimiento += 1;
  }

        
        /* MATERIAL ASOCIADO*/
        window.contamaso = 1
        function masmaso() {
            var inputmaso = `<table class="table table-bordered"><strong>X. MATERIAL ASOCIADO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #8686C4; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #8686C4; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="MASOmuestra${window.contamaso}" style="width:300px"></td>
                                <td><input type="text" name="MASOnomenclatura${window.contamaso}" style="width:300px"></td>
                                <td><input type="text" name="MASOinf_requerida${window.contamaso}" style="width:300px"></td>
                                <td><input type="text" name="MASOdes_muestra${window.contamaso}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #8686C4; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Responsable</th>
                                <th style="background-color: #8686C4; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="MASOubicacion${window.contamaso}" style="width:300px"></td>
                                <td><input type="text" name="MASOresponsable${window.contamaso}" style="width:300px"></td>
                                <td><input type="text" name="MASOiden_muestra${window.contamaso}" style="width:300px"></td>


                            </tr>



                        </tbody>


                    </table>`
            $('#inputmaso').append(inputmaso)
            window.contamaso += 1;
        }

        /* SALES */
        window.contasales = 1
        function massales() {
            var inputsales = `<table class="table table-bordered"><strong>XI. SALES</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #009999; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #009999; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #009999; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #009999; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="SALmuestra${window.contasales}" style="width:300px"></td>
                                <td><input type="text" name="SALnomenclatura${window.contasales}" style="width:300px"></td>
                                <td><input type="text" name="SALinf_requerida${window.contasales}" style="width:300px"></td>
                                <td><input type="text" name="SALdes_muestra${window.contasales}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #009999; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #009999; color:white; width:300px">Responsable</th>
                                <th style="background-color: #009999; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="SALubicacion${window.contasales}" style="width:300px"></td>
                                <td><input type="text" name="SALresponsable${window.contasales}" style="width:300px"></td>
                                <td><input type="text" name="SALiden_muestra${window.contasales}" style="width:300px"></td>


                            </tr>



                        </tbody>


                    </table>`
            $('#inputsales').append(inputsales)
            window.contasales += 1;
        }


        /* MATERIAL AGREGADO */
        window.contamatag = 1
        function masmatag() {
            var inputmaterialag = `<table class="table table-bordered"><strong>XII.MATERIAL AGREGADO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #7D10C0; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="MAGmuestra${window.contamatag}" style="width:300px"></td>
                                <td><input type="text" name="MAGnomenclatura${window.contamatag}" style="width:300px"></td>
                                <td><input type="text" name="MAGinf_requerida${window.contamatag}" style="width:300px"></td>
                                <td><input type="text" name="MAGdes_muestra${window.contamatag}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #7D10C0; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">Responsable</th>
                                <th style="background-color: #7D10C0; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="MAGubicacion${window.contamatag}" style="width:300px"></td>
                                <td><input type="text" name="MAGresponsable${window.contamatag}" style="width:300px"></td>
                                <td><input type="text" name="MAGiden_muestra${window.contamatag}" style="width:300px"></td>


                            </tr>



                        </tbody>


                    </table>`
            $('#inputmaterialag').append(inputmaterialag)
            window.contamatag += 1;
        }


        /* BIODETERIORO */
        window.contabio = 1
        function masbio() {
            var inputbiodeterioro = `<table class="table table-bordered"><strong>XIII.BIODETERIORO</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A2C866; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #A2C866; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="BDTmuestra${window.contabio}" style="width:300px"></td>
                                <td><input type="text" name="BDTnomenclatura${window.contabio}" style="width:300px"></td>
                                <td><input type="text" name="BDTinf_requerida${window.contabio}" style="width:300px"></td>
                                <td><input type="text" name="BDTdes_muestra${window.contabio}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #A2C866; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A2C866; color:white; width:300px">Responsable</th>
                                <th style="background-color: #A2C866; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="BDTubicacion${window.contabio}" style="width:300px"></td>
                                <td><input type="text" name="BDTresponsable${window.contabio}" style="width:300px"></td>
                                <td><input type="text" name="BDTiden_muestra${window.contabio}" style="width:300px"></td>


                            </tr>



                        </tbody>


                    </table>`
            $('#inputbiodeterioro').append(inputbiodeterioro)
            window.contaotros += 1;
        }



        /* OTROS*/
        window.contaotros = 1
        function masotros() {
            var inputotros = `<table class="table table-bordered"  ><strong>XIV.OTROS</strong>
                        <thead>
                            <tr align="center">
                                <th style="background-color: #A5A5A5; color:white; width:300px">Número de muestra </th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Descripcion de la muestra</th>
                            </tr>
                             <tbody>
                            <tr >
                                <td><input type="text" name="OTmuestra${window.contaotros}" style="width:300px"></td>
                                <td><input type="text" name="OTnomenclatura${window.contaotros}" style="width:300px"></td>
                                <td><input type="text" name="OTinf_requerida${window.contaotros}" style="width:300px"></td>
                                <td><input type="text" name="OTdes_muestra${window.contaotros}" style="width:300px"></td>
                            </tr>
                        </tbody>
                            <tr>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">Responsable</th>
                                <th style="background-color: #A5A5A5; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" name="OTubicacion${window.contaotros}" style="width:300px"></td>
                                <td><input type="text" name="OTresponsable${window.contaotros}" style="width:300px"></td>
                                <td><input type="text" name="OTiden_muestra${window.contaotros}" style="width:300px"></td>


                            </tr>



                        </tbody>


                    </table>`
            $('#inputotros').append(inputotros)
            window.contaotros += 1;
        }




        //-- checkbuttons analisis general --
        function showSoporte() {
            element = document.getElementById("tabso");
            tsoporte = document.getElementById("tsoporte");
            if (tsoporte.checked) {
                element.style.display='block';
            } else {
                element.style.display='none';
            }
        }


        function showSoporte() {
            element = document.getElementById("tabso");
            tsoporte = document.getElementById("tsoporte");
            if (tsoporte.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showBase() {
            element = document.getElementById("tabbase");
            tbase = document.getElementById("tbase");
            if (tbase.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showEstra() {
            element = document.getElementById("tabestra");
            testra = document.getElementById("testra");
            if (testra.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showRevo() {
            element = document.getElementById("tabrevo");
            trevo = document.getElementById("trevo");
            if (trevo.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showBol() {
            element = document.getElementById("tabbol");
            tbol = document.getElementById("tbol");
            if (tbol.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showLami() {
            element = document.getElementById("tablami");
            tlami = document.getElementById("tlami");
            if (tlami.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showPig() {
            element = document.getElementById("tabpig");
            tpig = document.getElementById("tpig");
            if (tpig.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showAglu() {
            element = document.getElementById("tabaglu");
            taglu = document.getElementById("taglu");
            if (taglu.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showRecu() {
            element = document.getElementById("tabrecu");
            trecu = document.getElementById("trecu");
            if (trecu.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showMaso() {
            element = document.getElementById("tabmaso");
            tmaso = document.getElementById("tmaso");
            if (tmaso.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showSal() {
            element = document.getElementById("tabsal");
            tsal = document.getElementById("tsal");
            if (tsal.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showMagre() {
            element = document.getElementById("tabmagre");
            tmagre = document.getElementById("tmagre");
            if (tmagre.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showBio() {
            element = document.getElementById("tabbio");
            tbio = document.getElementById("tbio");
            if (tbio.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        function showOtro() {
            element = document.getElementById("tabotro");
            totro = document.getElementById("totro");
            if (totro.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }

        // TERCER FICHA
        function tipomaterial(sel) {
            if (sel.value=="Otro") {
                tipomateotro.style.display='block';
                selecttipomate.style.display='none';
            } else {
                tipomateotro.style.display='none';
                selecttipomate.style.display='block';
            }
        }

        function formaobtencion(sel) {
            if (sel.value=="Otro") {
                formamuestra.style.display='block';
                selectformamuestra.style.display='none';
            } else {
                formamuestra.style.display='none';
                selectformamuestra.style.display='block';
            }
        }

        function infodefinir(sel) {
            if (sel.value=="Otro") {
                infodefinirotro.style.display='block';
                selectinfo.style.display='none';
            } else {
                infodefinirotro.style.display='none';
                selectinfo.style.display='block';
            }
        }

        function analmicro(sel) {
            if (sel.value=="Otro") {
                analmorfootro.style.display='block';
                selecmorfo.style.display='none';
            } else {
                analmorfootro.style.display='none';
                selecmorfo.style.display='block';
            }
        }
        function analmicroquimico(sel) {
            if (sel.value=="Otro") {
                analmicroquimicootro.style.display='block';
                selecmicroquimico.style.display='none';
            } else {
                analmicroquimicootro.style.display='none';
                selecmicroquimico.style.display='block';
            }
        }
        function analelemental(sel) {
            if (sel.value=="Otro") {
                analelementalotro.style.display='block';
                selecelemental.style.display='none';
            } else {
                analelementalotro.style.display='none';
                selecelemental.style.display='block';
            }
        }
        function analmole(sel) {
            if (sel.value=="Otro") {
                analmoleotro.style.display='block';
                selecmole.style.display='none';
            } else {
                analmoleotro.style.display='none';
                selecmole.style.display='block';
            }
        }
        function analtincion(sel) {
            if (sel.value=="Otro") {
                analtincionotro.style.display='block';
                selectincion.style.display='none';
            } else {
                analtincionotro.style.display='none';
                selectincion.style.display='block';
            }
        }
        function analmicrobiologicos(sel) {
            if (sel.value=="Otro") {
                analmicrobiologicosotro.style.display='block';
                selecmicrobiologicos.style.display='none';
            } else {
                analmicrobiologicosotro.style.display='none';
                selecmicrobiologicos.style.display='block';
            }
        }
        function interpretacion(sel) {
            if (sel.value=="Otro") {
                analinterpretacionotro.style.display='block';
                selecinterpretacion.style.display='none';
            } else {
                analinterpretacionotro.style.display='none';
                selecinterpretacion.style.display='block';
            }
        }

//JS PARA LOS METODOS RECURSIVO DE MOSTRAR MAS CAMPOS EN LAS VISTAS CON EL BOTON "AGREGAR MAS"/
         window.contaresultados = 1
        function masresultados() {
            var inputresultados = `<br><table style="width: 50%"  border="0">
                            <tr>
                                <td><label for="resultado_interpretacion" class="input-group-addon" style="width: 400px">Resultado Interpretación</label></td>
                                <td><input type="text" class="form-control" name="resultado_interpretacion${window.contaresultados}" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="resultado_descripcion" class="input-group-addon">Resultado Descripción</label></td>
                                <td><input type="text" class="form-control" name="resultado_descripcion${window.contaresultados}" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="resultado_imagenes" class="input-group-addon">Resultado Imagenes</label></td>
                                <td><input type="file" class="form-control" name="resultado_imagenes${window.contaresultados}" style="width:500px; text-align:center;"></td>
                            </tr>
                            <tr>
                                <td><label for="resultado_datos" class="input-group-addon">Resultado Datos</label></td>
                                <td><input type="file" class="form-control" name="resultado_datos${window.contaresultados}" style="width:500px; text-align:center;"><br><br></td>
                            </tr></table>`
            $('#inputresultados').append(inputresultados)
            window.contaresultados += 1;
        }
    </script>
</head>
