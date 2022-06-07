@extends('layouts.template')
@section('title', 'Crear Usuario')

@section('content')

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-user"></i> PERFIL</h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> USUARIO</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title"><i class="fas fa-user-edit"></i> Nuevo Perfil</h5>
                    </div>
                    <div class="card-body">


                        <form action="{{ route('users.store') }}" method="POST"
                         enctype="multipart/form-data"
                            class="form-control form-createe">
                            <!--estogenera el token de validacion  -->
                            @csrf


                            <div class="row">
                                
                                    <div class="col-12">
                                        <div class="form-group">
                                        <label for="role">Nombre:</label>
                                        <select class="chosen-select form-control input-border-bottom cliente_id" id="role"
                                            name="role" data-placeholder="Cliente">
                                            <option value="" selected disabled hidden>Seleccione
                                                un ROl</option>
                                            @foreach ($data as $cliente)
                                                <option value="{{ $cliente->id }}">
                                                    {{ $cliente->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="alert alert-danger" role="alert">
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">


                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" name="nombre" onKeyPress="return sololetrascoma(event)"
                                            class="form-control" placeholder="Nombre" value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <div class="alert alert-danger" role="alert">
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="apellido">Apellido:</label>
                                        <input type="text" name="apellido" onKeyPress="return sololetrascoma(event)"
                                            class="form-control" placeholder="Apellido" value="{{ old('apellido') }}">
                                        @error('apellido')
                                            <div class="alert alert-danger" role="alert">
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cedula">Cedula:</label>

                                        <input type="text" name="cedula"  class="form-control"
                                            placeholder="Cedula" value="{{ old('cedula') }}" minlength="10"
                                            onKeyPress="return soloNumeros(event)" maxlength="10">
                                        @error('cedula')
                                            <div class="alert alert-danger" role="alert">
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nacimiento">Fecha de Nacimiento:</label>
                                        <input type="date" name="nacimiento" class="form-control"
                                            placeholder="Fecha de Nacimiento" value="{{ old('nacimiento') }}">
                                        @error('nacimiento')
                                            <div class="alert alert-danger" role="alert">
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Dirección:</label>

                                <input type="text" name="direccion" class="form-control" placeholder="Dirección"
                                    value="{{ old('direccion') }}">
                                @error('direccion')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cedula">Telefono :</label>
                                <input type="text" name="telefono" onKeyPress="return soloNumeros(event)"
                                    class="form-control" placeholder="telefono " value="{{ old('telefono') }}">
                                @error('telefono')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electronico:</label>
                                <input type="email" name="email" class="form-control" placeholder="Correo Electronico"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Foto de vivienda:</label>
                                <input type="file" name="image" accept="image/*" class="form-control imagejs"
                                    placeholder="Correo Electronico" value="{{ old('image') }}">
                                <input type="text" class="form-control text-center" disabled value='{{ old('image') }}'>
                                @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>


                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="{{ route('users.index') }}"
                                    class="btn btn-danger btn-border btn-round mr-2"><i class="fas fa-reply"></i>
                                    Cancelar</a>
                                <button class="btn btn-success btn-border btn-round mr-2" type="submit"><i
                                        class="fas fa-save"></i> Ingresar</button>
                            </div>




                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('img/ppp.jpg') }}" style="width: 100%; height:550px;" alt="...">

                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">


                                <img class="avatar border-gray" src=" {{ asset('img/ppp.jpg') }}" title="ver imagen"
                                    class="img-fluid center" alt="Responsive image" style="width:150px; height:350px;">
                            </a>
                            <p class="description">
                                Nuevo
                            </p>
                        </div>
                        <p class="description text-center">
                            “No será fácil<br> pero merecerá la pena.”
                        </p>
                    </div>
                    <hr>
                    <div class="button-container">
                        <br>
                        <a href="https://www.facebook.com/quantikaEcuador" data-title="Facebook" target="_blank"
                            class="btn btn-neutral btn-icon btn-round btn-lg">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
