<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/images/default.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">ENCABEZADO</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"> <span>Inicio</span></a></li>
            <!--<li class="active"><a href="{{ url('captura') }}"><i class='fa fa-link'></i> <span>Captura</span></a></li>
            <li class="active"><a href="{{ url('mostrar') }}"><i class='fa fa-link'></i> <span>Buscar</span></a></li>
            <li class="active"><a href="{{ url('Obras') }}"><i class='fa fa-link'></i> <span>Obras</span></a></li>-->
            <li class="treeview menu-open">

                <a href="{{ url('Obras') }}"><span>Ingreso de Obra/Pieza</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
               @permission(['Captura_Registro_Avanzada_1','Captura_Registro_Avanzada_2'])
                    <li><a href="{{ url('Obra/Capturar') }}"></i> <span>Capturar Obra/Pieza</span></a></li>
               @endpermission
                    <li><a href="{{ url('Obras') }}"></i> <span>Mostrar Obra/Pieza</span></a></li>
                    
                </ul>
            </li>
            
           
            <li class="treeview menu-open">
                <a href="#"><span>Restauración de Obra</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview menu-open">
                            <li class="treeview" style="height: auto;">
                                <a href="#">Taller STRC
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu" style="display: none;">
                                    <li class="active"><a href="{{ route('Obra.strc') }}"><span>Realizar Solicitud de Analisis</span></a></li>
                                        <li class="active"><a href="{{ route('lista.strc') }}"><span>Listado de Solicitudes Analisis</span></a></li>
                                    <li><a href="#">Solicitud de registro de imagen</a></li>
                                </ul>
                            </li>
                            <li class="treeview" style="height: auto;">
                                <a href="#">Taller STRPM
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu" style="display: none;">
                                    <li class="active"><a href="{{ route('Obra.strpm') }}"><span>Realizar Solicitud de Analisis</span></a></li>
                                        <li class="active"><a href="{{ route('lista.strm') }}"><span>Listado de Solicitudes Analisis</span></a></li>
                                    <li><a href="#">Solicitud de registro de imagen</a></li>
                                </ul>
                            </li>
                            <li class="treeview" style="height: auto;">
                                <a href="#">Taller STRPC
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu" style="display: none;">
                                    <li class="active"><a href="{{ route('Obra.strpc') }}"><span>Realizar Solicitud de Analisis</span></a></li>
                                        <li class="active"><a href="{{ route('lista.strpc') }}"><span>Listado de Solicitudes Analisis</span></a></li>
                                    <li><a href="#">Solicitud de registro de imagen</a></li>
                                </ul>
                            </li>
                            <li class="treeview" style="height: auto;">
                                <a href="#">Taller STREP
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu" style="display: none;">
                                    <li class="active"><a href="{{ route('Obra.strep') }}"><span>Realizar Solicitud de Analisis</span></a></li>
                                        <li class="active"><a href="{{ route('lista.strep') }}"><span>Listado de Solicitudes Analisis</span></a></li>
                                    <li><a href="#">Solicitud de registro de imagen</a></li>
                                </ul>
                            </li>
                            <li class="treeview" style="height: auto;">
                                <a href="#">Taller STREPyDG
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu" style="display: none;">
                                    <li class="active"><a href="{{ route('Obra.strepydg') }}"><span>Realizar Solicitud de Analisis</span></a></li>
                                        <li class="active"><a href="{{ route('lista.strepydg') }}"><span>Listado de Solicitudes Analisis</span></a></li>
                                    <li><a href="#">Solicitud de registro de imagen</a></li>
                                </ul>
                            </li>
                            <li class="treeview" style="height: auto;">
                                <a href="#">Taller STRM
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu" style="display: none;">
                                    <li class="active"><a href="{{ route('Obra.strm') }}"><span>Realizar Solicitud de Analisis</span></a></li>
                                        <li class="active"><a href="{{ route('lista.strm') }}"><span>Listado de Solicitudes Analisis</span></a></li>
                                    <li><a href="#">Solicitud de registro de imagen</a></li>
                                </ul>
                                
                            </li>
                           
                        </li>
            </li>
            

            @role(['Director_academico','Director_general','Secretaria','Seminarios_Taller','Laboratorios','admin'])
        </ul>
        <li class="treeview menu-open">
                <a href="#"><span>Laboratorios</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="treeview menu-open">
                            <li class="treeview" style="height: auto;">
                                <a href="#">Laboratorio de análisis científicos
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                    </a>
                                    <ul class="treeview-menu" style="display: none;">
                                    <li class="active"><a href="{{ url('AnalisisCientifico') }}"><span>Realizar Captura </span>
                                    <li class="active"><a href="{{ url('RegistroCientifico') }}"><span>Listado de Analisis</span></a></li></a></li>
                                </ul>
                            <li class="active"><a href="#"><span>Laboratorio de Fotografía</span></a></li>
            @endrole
                        </li>
            </li>
             </li>
            </ul>
            <li class="active"><a href="#"><span>Informes de Intervención</span></a></li>
            <li class="active"><a href="#"><span>Consulta</span></a></li>
            <li class="active"><a href="#"><span>Estadisticas</span></a></li>
             @role(['Director_academico','Director_general','Secretaria','Seminarios_Taller','Laboratorios','admin'])
            <li class="active"><a href="{{ url('admin/users') }}"> <span>Gestion de Usuarios</span></a></li>
            @endrole
            <li class="active"><a href="{{ route('soporte') }}"> <span>Soporte</span></a></li>
        </ul><!-- /.sidebar-menu
        <ul class="treeview-menu">
                        <li><a href="#"></i><span>Taller STRC</span><i class="fa fa-angle-left pull-right"></i></a></li>
                        </ul> -->

    </section>
    <!-- /.sidebar -->
</aside>