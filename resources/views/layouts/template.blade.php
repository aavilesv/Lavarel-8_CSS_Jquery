<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    @yield('metadatos')
    <meta charset="UTF-8" />
    
    <!--<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" type="image/png" href="{{ asset('images/apvale.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Fonts and icons -->
    <script src="{{ asset('js/plugin/webfont/webfont.min.js') }}">
    </script>
    <link rel="stylesheet" href="{{ asset('css/fonts.min.css') }}">


    <!-- CSS Files -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/atlantis.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!--<link rel="stylesheet" href="{{ asset('css/demo.css') }}">-->
    <link href="{{ asset('css/tailwind.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
    
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fixedHeader.dataTables.min.css') }}">
    @yield('header')
    <script></script>
    <style>
        .title-it {
            color: #2e6ab9;
            font-weight: bold;
            font-size: 40px;
            font-family: Arial;

            text-transform: uppercase;
        }

        .roundss {
            background-color: #fff;
            border: 1px solid #ccc;
            -moz-border-radius: 11px;
            -webkit-border-radius: 11px;
            border-radius: 11px;
        }

        .card .image {
            overflow: hidden;
            height: 200px;
            position: relative;
        }

        .card .avatar {
            width: 30px;
            height: 30px;
            overflow: hidden;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .landing-page .section-story-overview .image-container:nth-child(2) {
            margin-left: 0;
            margin-bottom: 30px;
        }

        .card-user .image {
            height: 120px;
        }

        .card-user .author {
            text-align: center;
            text-transform: none;
            margin-top: -77px;
        }

        .card-user .avatar {
            width: 124px;
            height: 124px;
            border: 1px solid #FFFFFF;
            position: relative;
        }

        .card-user .author a+p.description {
            margin-top: -7px;
        }

        .card-user .avatar {
            width: 124px;
            height: 124px;
            border: 1px solid #FFFFFF;
            position: relative;
        }

        .card-user .card-body {
            min-height: 240px;
        }

        .card-user hr {
            margin: 5px 15px;
        }

        .card-user .button-container {
            margin-bottom: 6px;
            text-align: center;
        }

        p.description {
            font-size: 1.14em;
        }

        .description,
        .card-description,
        .footer-big p,
        .card .footer .stats {
            color: #9A9A9A;
            font-weight: 300;
        }

        .page-header .description {
            color: rgba(255, 255, 255, 0.8);
        }

        .card-user .author a+p.description {
            margin-top: -7px;
        }

    </style>
    @yield('styles')
    <!--</head>-->
</head>

<body onload="mueveReloj()">
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" 
            data-background-color="blue">

                <a href="" class="logo">
                    <img src="{{ asset('img/pobr.png') }}" alt="navbar brand" class="">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">

                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <!--<li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                aria-labelledby="messageDropdown">
                                <li>
                                    <div class="dropdown-title d-flex justify-content-between align-items-center">
                                        Messages
                                        <a href="#" class="small">Mark all as read</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('img/jm_denis.jpg') }}" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jimmy Denis</span>
                                                    <span class="block">
                                                        How are you ?
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('img/chadengle.jpg') }}" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Chad</span>
                                                    <span class="block">
                                                        Ok, Thanks !
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('img/mlane.jpg') }}" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jhon Doe</span>
                                                    <span class="block">
                                                        Ready for the meeting today...
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('img/talha.jpg') }}" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Talha</span>
                                                    <span class="block">
                                                        Hi, Apa Kabar ?
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all messages<i
                                            class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">You have 4 new notification</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        New user registered
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i>
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Rahmad commented on Admin
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="{{ asset('img/profile2.jpg') }}" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Reza send messages to you
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Farrah liked Admin
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i
                                            class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fas fa-layer-group"></i>
                            </a>
                            <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                <div class="quick-actions-header">
                                    <span class="title mb-1">Quick Actions</span>
                                    <span class="subtitle op-8">Shortcuts</span>
                                </div>
                                <div class="quick-actions-scroll scrollbar-outer">
                                    <div class="quick-actions-items">
                                        <div class="row m-0">
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-file-1"></i>
                                                    <span class="text">Generated Report</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-database"></i>
                                                    <span class="text">Create New Database</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-pen"></i>
                                                    <span class="text">Create New Post</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-interface-1"></i>
                                                    <span class="text">Create New Task</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-list"></i>
                                                    <span class="text">Completed Tasks</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-file"></i>
                                                    <span class="text">Create New Invoice</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>-->
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset(auth()->user()->image) }}" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="{{ asset(auth()->user()->image) }}"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>{{ auth()->user()->nombre }}</h4>
                                                <p class="text-muted">{{ auth()->user()->email }}</p><a
                                                    href="{{ route('usuario.index') }}"
                                                    class="btn btn-xs btn-secondary btn-sm">Ver
                                                    Perfil</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!--
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <a class="dropdown-item" href="#">My Balance</a>
                                        <a class="dropdown-item" href="#">Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <div class="dropdown-divider"></div>-->

                                        <a class="dropdown-item" href="{{ route('logout.logout') }}">Cerrar
                                            Sessi??n</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->


        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="{{ asset(auth()->user()->image) }}" alt="..."
                                class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    {{ auth()->user()->nombre }}

                                    @foreach (auth()->user()->getRoleNames()
    as $v)
                                        <span class="user-level">{{ $v }}</span>

                                    @endforeach
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#edit">
                                            <span class="link-collapse">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings">
                                            <span class="link-collapse">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a data-toggle="collapse" href="{{ route('__invoke') }}" class="collapsed"
                                aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Inicio</p>

                            </a>

                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Componentes</h4>
                        </li>

                        @foreach (auth()->user()->getRoleNames() as $v)
                            @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#asistencia">
                                        <i class="far fa-list-alt"></i>
                                        <p>Registro de Asistencia</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="asistencia">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('rrhasistencias.index') }}">
                                                    <span class="sub-item">Asistencia</span>
                                                </a>
                                            </li>
                                            @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                                                <li>
                                                    <a href="{{ route('rrhasistenciasdiarias.index') }}">
                                                        <span class="sub-item">Asistencia diaria</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('rrhasistenciasmusual.index') }}">
                                                        <span class="sub-item">Asistencia Mensual</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('asistencianocumplidas.index') }}">
                                                        <span class="sub-item">Atrasos Reporte</span>
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#inventario">
                                    <i class="fas fa-warehouse"></i>
                                    <p>Inventario</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="inventario">
                                    <ul class="nav nav-collapse">

                                        <li>
                                            <a href="{{ route('Inventario.index') }}">
                                                <span class="sub-item">Existencia</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('LocalInventario.index') }}">
                                                <span class="sub-item">Salida</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#soporte">
                                    <i class="fas fa-wrench"></i>
                                    <p>Soporte Tecnico</p>

                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="soporte">
                                    <ul class="nav nav-collapse">
                                        @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                                            <li>
                                                <a href="{{ route('novedads.index') }}">
                                                    <span class="sub-item">Novedades</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('novedadupdatecontroller.index') }}">
                                                    <span class="sub-item">Modificar Novedades</span>
                                                </a>
                                            </li>
                                            @endif
                                            <li>
                                                <a href="{{ route('clientesagregar.index') }}">
                                                    <span class="sub-item">Actualizar Clientes</span>
                                                </a>
                                            </li>
                                        
                                        <li>
                                            <a href="{{ route('soportes.index') }}">
                                                <span class="sub-item">Visita de Soporte</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('reporteradio.index') }}">
                                                <span class="sub-item">Reporte en Radio</span>
                                            </a>
                                        </li>
                                        @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                                        <li>
                                            <a href="{{ route('editarreporteradio.index') }}">
                                                <span class="sub-item">Editar reporte de radio</span>
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{ route('reportefibra.index') }}">
                                                <span class="sub-item">Reporte en fibra</span>
                                            </a>
                                        </li>
                                        @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                                        <li>
                                            <a href="{{ route('editarreportefibra.index') }}">
                                                <span class="sub-item">Editar reporte de fibra</span>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                           @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                             <li class="nav-item">
                                    <a data-toggle="collapse" href="#cuentrascobrar">
                                        <i class="fas fa-archive"></i>
                                        <p>Caja y Cobros</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="cuentrascobrar">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('cuentasporcobrar.index') }}">
                                                    <span class="sub-item">Cobros Mensuales</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('cobroextra.index') }}">
                                                    <span class="sub-item">Cobros Extras</span>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="{{ route('diariacobro.index') }}">
                                                    <span class="sub-item">Caja Diaria</span>
                                                </a>
                                            </li>
                                            <!--<li>
                                                <a href="{{ route('cobropendiente.index') }}">
                                                    <span class="sub-item">Clientes deudores</span>
                                                </a>
                                            </li>-->
                                            
                                            <li>
                                                <a href="{{ route('reportecaja.index') }}">
                                                    <span class="sub-item">Reportes de Caja</span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                            @endif<!--
                            @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                             <li class="nav-item">
                                    <a data-toggle="collapse" href="#listarcobro">
                                        <i class="icon-user-unfollow"></i>
                                        <p>Fecha de Cortes</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="listarcobro">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('listarcobrocorte.index') }}">
                                                    <span class="sub-item">Fecha de corte</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('cuentasporcobrar.index') }}">
                                                    <span class="sub-item">Deudores</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif-->
                            @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#clientes">
                                        <i class="fas fa-user-friends"></i>
                                        <p>Registro de Clientes</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="clientes">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('clientes.index') }}">
                                                    <span class="sub-item">Clientes</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('cantons.cantonlistar') }}">
                                                    <span class="sub-item">Canton</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('provincias.provincialistar') }}">
                                                    <span class="sub-item">Provincia</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if ($v === 'Gerente' or $v === 'Administrativo')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#recursos">
                                        <i class="fas fa-file-alt"></i>
                                        <p>Recursos humanos</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="recursos">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('rhareas.index') }}">
                                                    <span class="sub-item">??rea</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('rhcargos.index') }}">
                                                    <span class="sub-item"> Cargos</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('rhprofesiones.index') }}">
                                                    <span class="sub-item">Profesiones</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('rhempleados.index') }}">
                                                    <span class="sub-item">Empleados</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('rhcargafamiliar.index') }}">
                                                    <span class="sub-item">Cargas Familiares</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('rhtipocontratos.index') }}">
                                                    <span class="sub-item">Tipo de Contrato</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('rhcontratos.index') }}">
                                                    <span class="sub-item">Contratos</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#promocion">
                                        <i class="icon-present"></i>
                                        <p>Promociones y Sorteo</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="promocion">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('promocion.index') }}">
                                                    <span class="sub-item">Promaciones</span>
                                                </a>
                                            </li>
                                            <!--<li>
                                                <a href="{{ route('tipocontrato.index') }}">
                                                    <span class="sub-item">Sorteo</span>
                                                </a>
                                            </li>-->
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            
                            @if ($v === 'Gerente' or $v === 'Administrativo' or $v == 'Soporte')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#contratosclientes">
                                        <i class="fas fa-folder-open"></i>
                                        <p>Contratos de Clientes</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="contratosclientes">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('contratoclientes.index') }}">
                                                    <span class="sub-item">Contratos</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('tipocontrato.index') }}">
                                                    <span class="sub-item">Tipo de Contrato</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if ($v === 'Gerente' or $v === 'Administrativo')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#usuarios">
                                        <i class="fas fa-address-book"></i>
                                        <p>Usuarios</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="usuarios">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('users.index') }}">
                                                    <span class="sub-item">Usuarios</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if ($v === 'Gerente' or $v === 'Administrativo')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#compras">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Compras</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="compras">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('marca.index') }}">
                                                    <span class="sub-item">Marca</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('articulo.index') }}">
                                                    <span class="sub-item">??rticulo</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('compra.index') }}">
                                                    <span class="sub-item">Compras</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('proveedor.index') }}">
                                                    <span class="sub-item">Proveedor</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if ($v === 'Gerente' or $v === 'Administrativo')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#nomina">
                                        <i class="far fa-money-bill-alt"></i>
                                        <p>Nomina de Pagos</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="nomina">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('nominapago.index') }}">
                                                    <span class="sub-item">Nomina de Pagos</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            @if ($v === 'Gerente' or $v === 'Administrativo')
                                <li class="nav-item">
                                    <a data-toggle="collapse" href="#administrar">
                                        <i class="fas fa-server"></i>
                                        <p>Administrar p??gina web</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="administrar">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="{{ route('planes.index') }}">
                                                    <span class="sub-item">Planes</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('quiensomos.index') }}">
                                                    <span class="sub-item">Quienes somos</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('servicios.index') }}">
                                                    <span class="sub-item">Servicios</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('equipotrabajo.index') }}">
                                                    <span class="sub-item">Equipo de Trabajo</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('pagepromocion.index') }}">
                                                    <span class="sub-item">Promociones</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a data-toggle="collapse" href="#usuario">
                                    <i class="fas fa-user-alt"></i>
                                    <p>Perfil del Usuario</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="usuario">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{ route('usuario.index') }}">
                                                <span class="sub-item">Editar Perfil</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content conteinerr">




                <x-alert></x-alert>

                @yield('content')
                @yield('modal')
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        2021,Internet para Hogares with
                        <i class="fa fa-heart heart text-danger"></i> by <a
                            href="http://quantikaecuador.com/">Quantika</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
    <!-- jQuery Scrollbar -->
    <script src="{{ asset('js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Chart JS -->
    <!--<script src="{{ asset('js/plugin/chart.js/chart.min.js') }}"></script>-->
    <!-- jQuery Sparkline -->
    <!--<script src="{{ asset('js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>-->
    <!-- Chart Circle -->
    
    <!--<!--<script src="{{ asset('js/plugin/chart-circle/circles.min.js') }}"></script>-->-->
    <!-- Datatables -->
    <script src="{{ asset('js/plugin/datatables/datatables.min.js') }}"></script>
    
    <script src="{{ asset('js/plugin/datatables/dataTables.fixedHeader.min.js') }}"></script> 
    <!-- Bootstrap Notify -->
    <!--<script src="{{ asset('js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>-->
    <!-- jQuery Vector Maps -->
    <script src="{{ asset('js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="{{ asset('js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('js/atlantis.min.js') }}"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <!--<script src="{{ asset('js/setting-demo.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>-->
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script src="{{ asset('js/chosen.jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jqueryNumeric/jquery.numeric.js') }}" type="text/javascript"></script>
    <script>
        $('.chosen-select').chosen();
        $('.add-row').DataTable({
            "pageLength": 10,
        });
        $('.imagejs').on('change', function() {
            var rutaimg = $('.imagejs').val();
            var extension = rutaimg.substring(rutaimg.length - 3, rutaimg.length);
            if (extension.toLowerCase() === 'png' || extension.toLowerCase() === 'jpg' || extension
                .toLowerCase() === 'peg') {
                $('.imagejs').fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
            } else {
                $(".imagejs").val('');
                swal("Elegir Imagen!", "Debe ingresar una imagen!", {
                    icon: "error",
                    buttons: {
                        confirm: {
                            className: 'btn btn-danger'
                        }
                    },
                });

            }
        });
        $('.validarpdf').on('change', function() {
            var rutaimg = $('.validarpdf').val();
            var extension = rutaimg.substring(rutaimg.length - 3, rutaimg.length);
            if (extension.toLowerCase() === 'pdf' || extension.toLowerCase() === 'ocx' ||
                extension.toLowerCase() === 'docx') {
                $('.validarpdf').fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
            } else {
                $(".validarpdf").val('');
                swal("Elegir Archivo!", "Debe ingresar un archivo pdf o word!", {
                    icon: "error",
                    buttons: {
                        confirm: {
                            className: 'btn btn-danger'
                        }
                    },
                });

            }
        });
        $(".cuentaclick").click(function(){
            swal({
                title: 'Esta seguro?',
                text: "Enviar Datos!",
                type: 'info',
                icon: 'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'No, cancelar!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Si, Enviar datos!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    this.submit();
                } else {

                }
            });
        });
        $('.form-createe').submit(function(e) {
            e.preventDefault();
            swal({
                title: 'Esta seguro?',
                text: "Enviar Datos!",
                type: 'info',
                icon: 'info',
                buttons: {
                    cancel: {
                        visible: true,
                        text: 'No, cancelar!',
                        className: 'btn btn-danger'
                    },
                    confirm: {
                        text: 'Si, Enviar datos!',
                        className: 'btn btn-success'
                    }
                }
            }).then((willDelete) => {
                if (willDelete) {
                    this.submit();
                } else {

                }
            });
        });
        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });

        function mueveReloj() {
            momentoActual = new Date()
            hora = momentoActual.getHours()
            minuto = momentoActual.getMinutes()
            segundo = momentoActual.getSeconds()
            horaImprimible = hora + " : " + minuto + " : " + segundo
            document.form_reloj.reloj.value = horaImprimible
            setTimeout("mueveReloj()", 1000)
        }

    </script>
    <script src="{{ asset('js/funciones_validacion.js') }}"></script>

    @yield('scripts')
</body>

</html>
