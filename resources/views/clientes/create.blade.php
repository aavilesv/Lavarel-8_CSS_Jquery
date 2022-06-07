@extends('layouts.template')
@section('title', 'Ingresar Cliente')
@section('content')

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"> <i class="fas fa-user-alt"></i> CREAR CLIENTE</h1>

                    <h5 class="text-white op-7 mb-2"><i class="fas fa-align-justify"></i> Registro Cliente</h5>
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
                        <div class="card-category"><i class="far fa-clipboard"></i> Registar</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
<!--onsubmit="return todocedula()" -->
                            <form action="{{ route('clientes.store') }}" method="POST" 
                                class="form-control form-createe" enctype="multipart/form-data">
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
                                                                onKeyPress="return sololetrascoma(event)"
                                                                class="form-control roundss" placeholder="Apellido"
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
                                                                onKeyPress="return soloNumeros(event)" maxlength="13"
                                                                minlength="1"  class="form-control roundss"
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
                                                            <time class="date" datetime="9-25">Email</time>
                                                            <input type="email" name="email" class="form-control roundss"
                                                                placeholder="Correo Electronico : No requerido"
                                                                value="{{ old('email') }}">
                                                            @error('email')
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

                                                   
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Genero</time>
                                                            <select class="chosen-select form-control" name="sexo"
                                                                data-placeholder="Sucursal">
                                                                <option value="1">Masculino</option>
                                                                <option value="0">Femenino</option>
                                                                
                                                            </select>
                                                            @error('sexo')
                                                            <div class="alert alert-danger" role="alert">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Estado Civil</time>
                                                            <select class="chosen-select form-control" name="estadocivil"
                                                                data-placeholder="Sucursal">
                                                                <option value="1">Casado</option>
                                                                <option value="2">Soltero</option>
                                                                <option value="3">Divorciado</option>
                                                                
                                                            </select>
                                                            @error('estadocivil')
                                                            <div class="alert alert-danger" role="alert">
                                                                <small>{{ $message }}</small>
                                                            </div>
                                                        @enderror
                                                        </div>
                                                    </li>
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto del cliente</time>
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
                                                    <li class="feed-item feed-item-success">
                                                        <div class="row">
                                                            <time class="date" datetime="9-25">Foto del cliente#2</time>
                                                            <input type="file" name="fotocedula2" accept="image/*"
                                                                class="form-control imagejs" placeholder="Foto Empleado"
                                                                value="{{ old('fotocedula2') }}">
                                                            @error('fotocedula2')
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


    </script>

@endsection
