@extends('layouts.template')
@section('title', 'Editar Contrato')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="far fa-file-alt"></i> Editar Contrato de Cliente</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-folder-open"></i> Recursos Humanos</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"> <i class="far fa-file-alt"> Formulario</i></div>
                        <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <form action="{{ route('contratoclientes.update',$Cclicontratocliente) }}" method="POST"
                                class="form-control form-createe" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <i class="fas fa-pen-alt"></i> Relizar Contrato
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date col-12" datetime="9-25">Tipo de
                                                                Contrato</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="cclicontratotipocliente_id"
                                                                    name="cclicontratotipocliente_id"
                                                                    data-placeholder="Profesión">


                                                                    <option
                                                                        value="{{ $Cclicontratocliente->cclicontratotipocliente->id }}">
                                                                        Seleccionado
                                                                        {{ $Cclicontratocliente->cclicontratotipocliente->descripcion }}
                                                                    </option>

                                                                    @foreach ($tipocontrato as $tipocontrat)
                                                                        <option value="{{ $tipocontrat->id }}">
                                                                            {{ $tipocontrat->descripcion }}
                                                                        </option>
                                                                        s
                                                                    @endforeach

                                                                </select>
                                                                @error('cclicontratotipocliente_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Tipo de Contrato"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('tipocontrato.create') }}"
                                                                    rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date col-12"
                                                                datetime="9-25">Cantón:Provincia</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control" id="canton_id"
                                                                    name="canton_id" data-placeholder="Sucursal">
                                                                    <option
                                                                        value="{{ $Cclicontratocliente->canton->id }}">
                                                                        Seleccionado

                                                                        {{ $Cclicontratocliente->canton->name }}-{{ $Cclicontratocliente->canton->provincia->name }}
                                                                    </option>
                                                                    @foreach ($cantons as $canton)
                                                                        <option value="{{ $canton->id }}">
                                                                            {{ $canton->name }}-{{ $canton->provincia->name }}
                                                                        </option>
                                                                        s
                                                                    @endforeach
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
                                                            <time class="date col-12" datetime="9-25">Clientes:Cedula</time>
                                                            <div class="col-md-9">
                                                                <select
                                                                    class="chosen-select form-control input-border-bottom cliente_id"
                                                                    id="cliente_idd" name="cliente_id"
                                                                    data-placeholder="Cliente">
                                                                    <option
                                                                        value="{{ $Cclicontratocliente->cliente->id }}">
                                                                        Seleccionado
                                                                        {{ $Cclicontratocliente->cliente->nombre }}
                                                                        {{ $Cclicontratocliente->cliente->apellido }} :
                                                                        {{ $Cclicontratocliente->cliente->cedula }}
                                                                    </option>
                                                                    @foreach ($clientes as $cliente)
                                                                        <option value="{{ $cliente->id }}" data-cjson='{"cedula":"{{ $cliente->cedula }}"
                                                                                            ,"contacto":"{{ $cliente->contacto }}",
                                                "apellido":"{{ $cliente->apellido }}"
                                                ,"nombre":"{{ $cliente->nombre }}"}'>
                                                                            {{ $cliente->nombre }}
                                                                            {{ $cliente->apellido }} :
                                                                            {{ $cliente->cedula }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('cliente_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Cliente"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('clientes.create') }}" rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Nombre</time>
                                                            <input type="text" id="cnombre"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="{{ old('direccion', $Cclicontratocliente->cliente->nombre) }}">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Apellido</time>
                                                            <input type="text" id="capellido"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="{{ old('direccion', $Cclicontratocliente->cliente->apellido) }}">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cedula</time>
                                                            <input type="text" id="ccedula"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="{{ old('direccion', $Cclicontratocliente->cliente->cedula) }}">
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Dirección</time>
                                                            <input type="text" name="direccion"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Dirección: requerido"
                                                                value="{{ old('direccion', $Cclicontratocliente->direccion) }}">
                                                            @error('direccion')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Cdla o Recinto</time>
                                                            <input type="text" name="cdaorecinto"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Cdla o Recinto: requerido"
                                                                value="{{ old('cdaorecinto', $Cclicontratocliente->cdaorecinto) }}">
                                                            @error('cdaorecinto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Sector</time>
                                                            <input type="text" name="sector"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Sector: requerido"
                                                                value="{{ old('sector', $Cclicontratocliente->sector) }}">
                                                            @error('sector')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Tipo de vivienda</time>
                                                            <input type="text" name="tipodevivienda"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Tipo de vivienda: requerido"
                                                                value="{{ old('tipodevivienda', $Cclicontratocliente->tipodevivienda) }}">
                                                            @error('tipodevivienda')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Contacto</time>
                                                            <input type="text" name="contacto"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Contacto: requerido"
                                                                onKeyPress="return soloNumeros(event)" maxlength="10"
                                                                value="{{ old('contacto', $Cclicontratocliente->contacto) }}">
                                                            @error('contacto')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">contacto 2</time>
                                                            <input type="text" name="contacto1"
                                                                class="form-control input-border-bottom"
                                                                placeholder="No requerido"
                                                                onKeyPress="return soloNumeros(event)" maxlength="10"
                                                                value="{{ old('contacto1', $Cclicontratocliente->contacto1) }}">
                                                            @error('contacto1')
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
                                                    <i class="icon-speedometer"> Servicios</i>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date" datetime="9-25">#Contrato</time>
                                                            <input type="text" name="contratocodigo"
                                                            onKeyPress="return soloNumeros(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingreso Codigo de contrato"
                                                                value="{{ old('contratocodigo', $Cclicontratocliente->contratocodigo) }}">
                                                            @error('contratocodigo')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date" datetime="9-25">#Codigo de Documento</time>
                                                            <input type="text" name="documentocodigo"
                                                            onKeyPress="return soloNumeros(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingreso Codigo de documentocodigo"
                                                                value="{{ old('documentocodigo', $Cclicontratocliente->documentocodigo) }}">
                                                            @error('documentocodigo')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Tipo de servicio</time>
                                                            <select class="chosen-select form-control" name="tipodeservicio"
                                                                data-placeholder="Sucursal">
                                                                <option
                                                                    value="{{ $Cclicontratocliente->tipodeservicio }}">
                                                                    Seleccionado:
                                                                    {{ $Cclicontratocliente->tipodeservicio }}</option>
                                                                <option value="Domestico">Domestico</option>
                                                                <option value="Dedicado">Dedicado</option>
                                                                <option value="Cyber">Cyber</option>
                                                            </select>
                                                            @error('tipodeservicio')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-primary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Ancho de banda</time>
                                                            <input type="text" name="anchodebanda"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ancho de banda : Requerido"
                                                                value="{{ old('anchodebanda', $Cclicontratocliente->anchodebanda) }}">
                                                            @error('anchodebanda')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Modalidad de Equipo</time>
                                                            <select class="chosen-select form-control"
                                                                name="modalidadequipo" data-placeholder="Sucursal">
                                                                <option
                                                                    value="{{ $Cclicontratocliente->modalidadequipo }}">
                                                                    Seleccionado:
                                                                    {{ $Cclicontratocliente->modalidadequipo }}</option>
                                                                <option value="Alquiler">Alquiler</option>
                                                                <option value="Propio">Propio</option>
                                                            </select>
                                                            @error('modalidadequipo')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Comportación</time>
                                                            <input type="text" name="comportacion"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Comportacion : Requerido"
                                                                value="{{ old('comportacion', $Cclicontratocliente->comportacion) }}">
                                                            @error('comportacion')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Servicio por Radio o
                                                                fibra</time>
                                                            <select class="chosen-select form-control" name="servicio"
                                                                data-placeholder="Sucursal">
                                                                <option value="{{ $Cclicontratocliente->servicio }}">
                                                                    @if ($Cclicontratocliente->servicio === 1)

                                                                        <span class="badge badge-success"> Seleccionado:
                                                                            Radio</span>
                                                                    @else
                                                                        <span class="badge badge-danger"> Seleccionado:
                                                                            Fibra</span>
                                                                    @endif
                                                                </option>
                                                                <option value="1">Radio</option>
                                                                <option value="0">Fibra</option>
                                                            </select>
                                                            @error('servicio')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">GPS</time>
                                                            <input type="text" name="gps"
                                                                class="form-control input-border-bottom" placeholder="GPS"
                                                                value="{{ old('gps', $Cclicontratocliente->gps) }}">
                                                            @error('gps')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>



                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Latitud</time>
                                                            <input type="text" name="latitud"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingresa los numeros por favor de google maps"
                                                                value="{{ old('latitud', $Cclicontratocliente->latitud) }}"
                                                                value="2">
                                                            @error('latitud')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Longitud</time>

                                                            <input type="text" name="longitud"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Ingresa los numeros por favor de google maps"
                                                                value="{{ old('longitud', $Cclicontratocliente->longitud) }}">
                                                            @error('longitud')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Tarifa ($)</time>

                                                            <input type="text" name="tarifa"
                                                                class="form-control input-border-bottom"
                                                                onKeyPress="return soloNumeros(event)"
                                                                placeholder="Ingresa valor mensual a pagar"
                                                                value="{{ old('tarifa', $Cclicontratocliente->tarifa) }}">
                                                                @error('tarifa')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label for="nombres">Archivo:</label>
                                                                <br>
                                                                <a class="btn btn-link btn-primary btn-lg" target="_blank"
                                                                    data-toggle="tooltip" data-original-title="Ver"
                                                                    href="{{ asset($Cclicontratocliente->archivo) }}"><i
                                                                        class="fas fa-file-alt"> Archivo</i></a>
                                                            </div>
                                                            <input type="file" name="archivo"
                                                                class="form-control validarpdf"
                                                                placeholder="Archivo Contrato"
                                                                value="{{ old('archivo') }}">
                                                            <input type="text" onKeyPress="return nadasindatos(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="{{ old('direccion', $Cclicontratocliente->archivo) }}">
                                                            @error('archivo')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label for="nombres">Foto de Vivienda:</label>

                                                                <center> <a
                                                                        href="{{ asset($Cclicontratocliente->ffoto) }}"
                                                                        data-lightbox="mygallery"
                                                                        data-title="{{ $Cclicontratocliente->cliente->nombre }} {{ $Cclicontratocliente->cliente->apellido }}">
                                                                        <img src="{{ asset($Cclicontratocliente->ffoto) }}"
                                                                            title="ver imagen" class="img-fluid center"
                                                                            alt="Responsive image"
                                                                            style="width:100px; height:100px;"></a>
                                                                </center>

                                                            </div>
                                                            <input type="file" name="ffoto" accept="image/*"
                                                                class="form-control imagejs" placeholder="Archivo Contrato"
                                                                value="{{ old('ffoto') }}">
                                                            <input type="text" onKeyPress="return nadasindatos(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Descirpción: requerido"
                                                                value="{{ old('direccion', $Cclicontratocliente->ffoto) }}">
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
                                <div class="col-md-12">
                                    <div class="card full-height">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <i class="fas fa-list-ul"> Referencias Familiares</i>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <time class="date" datetime="9-25">1)</time>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-success">
                                                            <div class="row">

                                                                <time class="date" datetime="9-25">Nombre</time>
                                                                <input type="text" name="rnombre"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Nombre: no requerido"
                                                                    value="{{ old('rnombre', $Cclicontratocliente->rnombre) }}">
                                                                @error('rnombre')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>


                                                        <li class="feed-item feed-item-primary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Parantesco</time>
                                                                <input type="text" name="rparantesco"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Parantesco: no requerido"
                                                                    value="{{ old('rparantesco', $Cclicontratocliente->rparantesco) }}">
                                                                @error('rparantesco')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>



                                                    </ol>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">

                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Apellido</time>
                                                                <input type="text" name="rapellido"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Apellido: no requerido"
                                                                    value="{{ old('rapellido', $Cclicontratocliente->rapellido) }}">
                                                                @error('rapellido')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>

                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Celular</time>
                                                                <input type="text" name="rcelular"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Contacto: no requerido "
                                                                    value="{{ old('rcelular', $Cclicontratocliente->rcelular) }}"
                                                                    onKeyPress="return soloNumeros(event)" minlength="10"
                                                                    maxlength="10">
                                                                @error('rcelular')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                            <time class="date" datetime="9-25">2)</time>
                                            <hr>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">
                                                        <li class="feed-item feed-item-success">
                                                            <div class="row">

                                                                <time class="date" datetime="9-25">Nombre</time>
                                                                <input type="text" name="nombre"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Nombre: no requerido"
                                                                    value="{{ old('nombre', $Cclicontratocliente->nombre) }}">
                                                                @error('nombre')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>


                                                        <li class="feed-item feed-item-primary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Parantesco</time>
                                                                <input type="text" name="parantesco"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Parantesco: no requerido"
                                                                    value="{{ old('parantesco', $Cclicontratocliente->parantesco) }}">
                                                                @error('parantesco')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>



                                                    </ol>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <ol class="activity-feed">

                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Apellido</time>
                                                                <input type="text" name="apellido"
                                                                    onKeyPress="return sololetrascoma(event)"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Apellido: no requerido"
                                                                    value="{{ old('apellido', $Cclicontratocliente->apellido) }}">
                                                                @error('apellido')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </li>

                                                        <li class="feed-item feed-item-secondary">
                                                            <div class="row">
                                                                <time class="date" datetime="9-25">Celular</time>
                                                                <input type="text" name="celular"
                                                                    class="form-control input-border-bottom"
                                                                    placeholder="Contacto: no requerido "
                                                                    value="{{ old('celular', $Cclicontratocliente->celular) }}"
                                                                    onKeyPress="return soloNumeros(event)" minlength="10"
                                                                    maxlength="10">
                                                                @error('rcelular')
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
                                </div>
                                <!-- aqui sale-->
                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i
                                        class="fas fa-reply"></i>
                                    Volver</a>
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


@section('scripts')
    <script>
        $('#cliente_idd').change(function() {

            var cliente = $('#cliente_idd option:selected').data('cjson');

            //           $('#direccion').val(cliente.direc);
            $('#cnombre').val(cliente.nombre);
            $('#capellido').val(cliente.apellido);
            $('#ccedula').val(cliente.cedula);
            //$('#gps').val(cliente.gps);
            //$('#contacto1').val(cliente.contacto1);
            //$('#cdaorecinto').val(cliente.cdaorecinto);

        });

    </script>
@endsection
