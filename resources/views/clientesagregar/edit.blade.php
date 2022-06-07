@extends('layouts.template')
@section('title', 'Editar datos de cliente')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-phone-volume"></i> Editar Contrato de Cliente</h1>

                    <h5 class="text-white op-7 mb-2"><i class="icon-globe"></i> Recursos Humanos</h5>
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

                            <form action="{{ route('clientesagregar.update', $Cclicontratocliente) }}" method="POST"
                                class="form-control form-createe" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <i class="fas fa-pen-alt"></i> Datos del cliente
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <ol class="activity-feed">
                                                            <li class="feed-item feed-item-secondary">

                                                                <time class="date" datetime="9-25">Nombre</time>
                                                                <span
                                                                    class="text">{{ $Cclicontratocliente->cliente->nombre }}</span>

                                                            </li>
                                                            <li class="feed-item feed-item-success">
                                                                <time class="date" datetime="9-25">ANCHO DE BANDA
                                                                </time>
                                                                <span
                                                                    class="text">{{ $Cclicontratocliente->anchodebanda }}</span>


                                                            </li>
                                                        </ol>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <ol class="activity-feed">
                                                            <li class="feed-item feed-item-secondary">

                                                                <time class="date" datetime="9-25">Apellido</time>
                                                                <span
                                                                    class="text">{{ $Cclicontratocliente->cliente->apellido }}</span>

                                                            </li>
                                                            <li class="feed-item feed-item-success">

                                                                <time class="date" datetime="9-25">SERVICIO POR RADIO O
                                                                    FIBRA
                                                                </time>
                                                                <span class="text">
                                                                    @if ($Cclicontratocliente->servicio === 1)
                                                                        Radio
                                                                    @else
                                                                        Fibra
                                                                    @endif
                                                                </span>

                                                            </li>

                                                        </ol>
                                                    </div>
                                                </div>





                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <i class="icon-speedometer"> Servicios</i>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <ol class="activity-feed">
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

<div class="row">
    <div class="col-md-6">
        <ol class="activity-feed">
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
        </ol>
    </div>
    <div class="col-md-6">
        <ol class="activity-feed">
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
        </ol>
    </div>
</div>

                                                   
                                                   
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto de Vivienda</time>
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
                                    <a href="{{ route('clientesagregar.index') }}"
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
