@extends('layouts.template')
@section('title', 'Editar Contrato')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="far fa-file-alt"></i> Editar Contrato  de Empleado</h1>

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
                        <div class="card-title"> <i class="fas fa-file-alt"> Formulario</i></div>
                        <div class="card-category"><i class="fas fa-align-justify"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                            <form action="{{ route('rhcontratos.update',$rrhcontrato) }}" method="POST"
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
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Empleados</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="rrhempleado_id" name="rrhempleado_id"
                                                                    data-placeholder="Empleado">
                                                                        <option value="{{ $rrhcontrato->rrhempleado->id }}">Seleccionado 
                                                                            Nombre-Cedula: {{ $rrhcontrato->rrhempleado->nombre }}</option>
                                                                           
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
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date col-12" datetime="9-25">Tipo de Contrato</time>
                                                            <div class="col-md-9">
                                                                <select class="chosen-select form-control roundss"
                                                                    id="rrhtipocontrato_id" name="rrhtipocontrato_id"
                                                                    data-placeholder="Profesión">
                                                                    
                                                                        <option value="   {{ $rrhcontrato->rrhtipocontrato->id}}" >Seleccionado Tipo de Contrato
                                                                           {{ $rrhcontrato->rrhtipocontrato->descripcion}}
                                                                        </option>
                                                                       
                                                                        @foreach ($tipocontrato as $tipocontrat)
                                                                            <option value="{{ $tipocontrat->id }}">
                                                                                {{ $tipocontrat->descripcion }}
                                                                            </option>
                                                                            s
                                                                        @endforeach
                                                               
                                                                </select>
                                                                @error('rrhtipocontrato_id')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        <small>{{ $message }}</small>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a data-toggle="tooltip"
                                                                    data-original-title="Ingresar Tipo de Contrato"
                                                                    class="btn btn-success btn-sm rounded-circle"
                                                                    href="{{ route('rhtipocontratos.create') }}"
                                                                    rel="action">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>

                                              
                                                    <li class="feed-item feed-item-secondary">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Sueldo</time>
                                                            <input type="text" name="sueldo" class="form-control roundss"
                                                                placeholder="Descirpción: requerido"

                                                                onKeyPress="return soloNumerospunto(event)"
                                                                value="{{ old('sueldo',$rrhcontrato->sueldo) }}">
                                                            @error('sueldo')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <small>{{ $message }}</small>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </li>
                                               
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Archivo</time>
                                                            <input type="file" name="archivo" 
                                                            class="form-control validarpdf" placeholder="Archivo Contrato"  
                                                            value="{{ old('archivo') }}">
                                                            @error('archivo')
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
                                                    
                                                   
                                                  
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Descripción</time>
                                                            <input type="text" name="descripcion" class="form-control roundss"
                                                                placeholder="Descripcion" value="{{ old('descripcion',$rrhcontrato->descripcion) }}">
                                                            @error('descripcion')
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
                                    <a href="javascript: history.go(-1)" class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i> Volver</a>
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
