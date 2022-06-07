@extends('layouts.template')
@section('title', 'Crear Empleado')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-user"></i> Crear Empleado</h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> Recursos Humanos</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"> <i class="fas fa-address-card"> Formulario</i></div>
                        <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <form action="{{ route('rhempleados.store') }}" method="POST" onsubmit="return todocedula()"
                                class="form-control" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">

                                                    <i class="fas fa-user"></i> Datos Personales
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date" datetime="9-25">Nombre</time>
                                                            <input type="text" name="nombre"
                                                                onKeyPress="return sololetrascoma(event)"
                                                                class="form-control roundss" placeholder="Nombres"
                                                                value="{{ old('nombre') }}">
                                                            @error('nombre')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Apellido</time>
                                                            <input type="text" name="apellido"
                                                                onKeyPress="return sololetrascoma(event)" class="form-control roundss" placeholder="Apellido"
                                                                value="{{ old('apellido') }}">
                                                            @error('apellido')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cédula</time>
                                                            <input type="text" name="cedula" id="cedula"
                                                                onKeyPress="return soloNumeros(event)" maxlength="10"
                                                                minlength="10" required class="form-control roundss"
                                                                placeholder="Cédula" value="{{ old('cedula') }}">
                                                            @error('cedula')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Fecha Nacimiento</time>
                                                            <input type="date" name="fechanacimiento"
                                                                class="form-control roundss" placeholder="Fecha Nacimiento"
                                                                value="{{ old('fechanacimiento') }}">
                                                            @error('fechanacimiento')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Dirección</time>
                                                            <input type="text" name="direccion" class="form-control roundss"
                                                                placeholder="Dirección" value="{{ old('direccion') }}">
                                                            @error('direccion')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cdla O Recinto</time>
                                                            <input type="text" name="cdaorecinto"
                                                                class="form-control roundss" placeholder="Cdla o Recinto"
                                                                value="{{ old('cdaorecinto') }}">
                                                            @error('cdaorecinto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Email</time>
                                                            <input type="email" name="email" class="form-control roundss"
                                                                placeholder="Correo Electronico"
                                                                value="{{ old('email') }}">
                                                            @error('email')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Contacto</time>
                                                            <input type="text" name="contacto" class="form-control roundss"
                                                                placeholder="Contacto:requerido "
                                                                value="{{ old('contacto') }}"
                                                                onKeyPress="return soloNumeros(event)" minlength="10"
                                                                maxlength="10">
                                                            @error('contacto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Contacto 2</time>
                                                            <input type="text" name="contacto1" class="form-control roundss"
                                                                placeholder="Contacto 2: no requerido "
                                                                value="{{ old('contacto1') }}"
                                                                onKeyPress="return soloNumeros(event)" minlength="10"
                                                                maxlength="10">
                                                            @error('contacto1')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Sexo</time>
                                                            <select class="chosen-select form-control roundss" id="sexo"
                                                                name="sexo" data-placeholder="Sexo">
                                                                @if ($action == 'new')
                                                                    <option value="" selected disabled hidden>Seleccione
                                                                        un Cargo
                                                                    </option>
                                                                @endif
                                                                <option value="1">
                                                                    Hombre
                                                                </option>
                                                                <option value="0">
                                                                    Mujer
                                                                </option>



                                                            </select>
                                                            @error('sexo')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">

                                                    <i class="flaticon-technology-1"></i> Datos Adicionales


                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Cantón</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="canton_id" name="canton_id"
                                                                    data-placeholder="Cantón">
                                                                    @if ($action == 'new')
                                                                        <option value="" selected disabled hidden>Seleccione
                                                                            un
                                                                            Cantón-Provincia</option>
                                                                    @endif
                                                                    @if ($action == 'new' or $action == 'edit')
                                                                        @foreach ($cantons as $canton)
                                                                            <option value="{{ $canton->id }}">
                                                                                {{ $canton->name }}-{{ $canton->provincia->name }}
                                                                            </option>
                                                                            s
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('canton_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Ciudad"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('cantons.create') }}" rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Profesión</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="rrhprofesion_id" name="rrhprofesion_id"
                                                                    data-placeholder="Profesión">
                                                                    @if ($action == 'new')
                                                                        <option value="" selected disabled hidden>Seleccione
                                                                            una Profesión
                                                                        </option>
                                                                    @endif
                                                                    @if ($action == 'new' or $action == 'edit')
                                                                        @foreach ($profesiones as $profesion)
                                                                            <option value="{{ $profesion->id }}">
                                                                                {{ $profesion->descripcion }}
                                                                            </option>
                                                                            s
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('rrhprofesion_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Profesión"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('rhprofesiones.create') }}"
                                                                    rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Área</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="rrharea_id" name="rrharea_id"
                                                                    data-placeholder="Area">
                                                                    @if ($action == 'new')
                                                                        <option value="" selected disabled hidden>Seleccione
                                                                            una Área
                                                                        </option>
                                                                    @endif
                                                                    @if ($action == 'new' or $action == 'edit')
                                                                        @foreach ($areas as $area)
                                                                            <option value="{{ $area->id }}">
                                                                                {{ $area->nombre }}
                                                                            </option>
                                                                            s
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('rrharea_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip" data-original-title="Ingresar Área"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('rhareas.create') }}" rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Cargo</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="rrhcargo_id" name="rrhcargo_id"
                                                                    data-placeholder="Cargo">
                                                                    @if ($action == 'new')
                                                                        <option value="" selected disabled hidden>Seleccione
                                                                            un Cargo
                                                                        </option>
                                                                    @endif
                                                                    @if ($action == 'new' or $action == 'edit')
                                                                        @foreach ($cargos as $cargo)
                                                                            <option value="{{ $cargo->id }}">
                                                                                {{ $cargo->nombre }}
                                                                            </option>
                                                                            s
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('rrhcargo_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Cargo"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('rhcargos.create') }}" rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Tipo de Licencia</time>
                                                            <input type="text" name="licencia" class="form-control roundss"
                                                                placeholder="Licencia: no requerido "
                                                                value="{{ old('licencia') }}">
                                                            @error('licencia')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Fecha de ingreso</time>
                                                            <input type="date" name="fechaingreso"
                                                                class="form-control roundss"
                                                                placeholder="Fehca ingreso: requerido"
                                                                value="{{ old('fechaingreso') }}">
                                                            @error('fechaingreso')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">$ Sueldo</time>
                                                            <input type="text" name="sueldo" class="form-control roundss"
                                                                placeholder="Sueldo: requerido "
                                                                value="{{ old('sueldo') }}"
                                                                onKeyPress="return soloNumeros(event)">
                                                            @error('sueldo')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto</time>
                                                            <input type="file" name="ffoto" accept="image/*" 
                                                            class="form-control imagejs" placeholder="Foto Empleado"  
                                                            value="{{ old('ffoto') }}">
                                                            @error('ffoto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="{{ route('rhempleados.index') }}"
                                        class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i>
                                        Cancelar</a>
                                    <button class="btn btn-success btn-border btn-round mr-2" type="submit"><i
                                            class="fas fa-save"></i> Ingresar</button>
                                </div>













                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
