



 @foreach($maso as $materialaso)
                <div class="input-group" id="tabso" >
                    <table class="table table-bordered" background-color: red;><strong>MATERIAL ASOCIADO</strong> 
                        <thead>
                            <tr align="center">
                                <th style="background-color: #8686C4; color:white; width:300px">Número de muestra</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Nomenclatura</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Información requerida</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Descripcion de la muestra</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Ubicación</th>
                                <th style="background-color: #8686C4; color:white; width:300px">Responsable</th>
                                <th style="background-color: #8686C4; color:white; width:300px">No. de indentificacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td><input type="text" name="MASOmuestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_muestra}}"></td>
                                <td><input type="text" name="MASOnomenclatura_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_nomenclatura}}"></td>
                                <td><input type="text" name="MASOinf_requerida_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_inf_requerida}}"></td>
                                <td><input type="text" name="MASOdes_muestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_des_muestra}}"></td>
                                <td><input type="text" name="MASOubicacion_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_ubicacion}}"></td>
                                <td><input type="text" name="MASOresponsable_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_responsable}}"></td>
                                <td><input type="text" name="MASOiden_muestra_edit{{$contador_maso}}" value="{{ $materialaso->materialaso_identificacion_muestra}}"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                    $contador_maso +=1;
                  ?>
               @endforeach
               @if($maso->isEmpty())
               @else
               <div align="center">
               <input type="button" id="otromaso" name="otromaso" class="btn-sm"  value="Agregar más" onclick="javascript:masmaso()">
                </div>
                <div id="inputmaso"></div><br>
                @endif