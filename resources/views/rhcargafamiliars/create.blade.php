@extends('layouts.template')
@section('title', 'Crear Carga Familiar')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-home"></i>Crear Cargas Familiares</h1>

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
                        <div class="card-title"> <i class="far fa-file-alt"> Formulario</i></div>
                        <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <form action="{{ route('rhcargafamiliar.store') }}" method="POST"
                                class="form-control form-createe" enctype="multipart/form-data">
                                <!--estogenera el token de validacion  -->
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card full-height">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <i class="fas fa-pen-alt"></i> Cargar Familiar
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">

                                                            <time class="date" datetime="9-25">Nombre</time>
                                                            <input type="text" name="nombre"
                                                                onKeyPress="return sololetrascoma(event)"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Nombre: no requerido"
                                                                value="{{ old('nombre') }}">
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
                                                            <input type="text" name="parentezco"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Parantesco: no requerido"
                                                                value="{{ old('parentezco') }}">
                                                            @error('parentezco')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>

                                                    
                                                    <li class="feed-item feed-item-primary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Fecha de Nacimiento</time>
                                                            <input type="date" name="fechanacimiento"
                                                                class="form-control input-border-bottom"
                                                                placeholder="Parantesco: no requerido"
                                                                value="{{ old('fechanacimiento') }}">
                                                            @error('fechanacimiento')
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
                                                    <i class="fas fa-list-ul"></i> 
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <ol class="activity-feed">
                                                    
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Empleados</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="rrhempleado_id" name="rrhempleado_id"
                                                                    data-placeholder="Empleado">
                                                                        <option value="" selected disabled hidden>Seleccione
                                                                            un Nombre-Cedula</option>
                                                                        @foreach ($empleados as $empleado)
                                                                            <option value="{{ $empleado->id }}">
                                                                                {{ $empleado->nombre }} {{ $empleado->apellido }} : 
                                                                                {{ $empleado->cedula }}
                                                                            </option>
                                                                        @endforeach
                                                                </select>
                                                                @error('rrhempleado_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Empleado"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('rhempleados.create') }}" rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                  
                             
                                                 
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-md-auto py-2 py-md-0">
                                    <a href="{{ route('rhcargafamiliar.index') }}"
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
