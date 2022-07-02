@extends('layouts.template')
@section('title', 'Usuario Cambio')
@section('content')

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h1 class="text-white title-it"><i class="fas fa-user"></i> PERFIL</h1>

                    <h5 class="text-white op-7 mb-2"><i class="far fa-building"></i> USUARIO</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a class="btn btn-primary btn-md btn-round ml-auto" data-toggle="tooltip" data-original-title="Editar"
                        href="{{ route('usuario.editar', $data->id) }}">
                        <i class="fa fa-edit"> Editar</i></a>
                        <a class="btn btn-success btn-md btn-round ml-auto" 
                        data-toggle="tooltip" data-original-title="Cambiar"
                        href="{{ route('usuario.cambiocontrasena') }}">
                        <i class="fas fa-undo"> Cambiar Contraseña</i></a>

                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title"><i class="fas fa-user-edit"></i> Bienvenido</h5>
                    </div>
                    <div class="card-body">
                        @if (Session::has('status'))
<hr />
<div class='text-success'>
    {{Session::get('status')}}
</div>
<hr />
@endif
                        <form>
                            <!--<fieldset disabled>-->
                            <div class="row">

                                <div class="col-6">

                                    <div class="form-group has-warning">
                                        <label for="username" class="control-label mb-1">Nombres:</label>
                                        <input id="username" name="nombre" type="text" class="form-control valid roundss"
                                            value='{{ $data->nombre }}'>
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group has-warning">
                                        <label for="first_name" class="control-label mb-1">Apellidos:</label>
                                        <input id="first_name" name="first_name" type="text"
                                            onKeyPress="return sololetras(event)" class="form-control valid roundss"
                                            data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                            aria-describedby="cc-name" minlength="4" maxlength="30"
                                            value='{{ $data->apellido }}' required="true">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="control-label mb-1">Dirección:</label>
                                <input type="text" class="form-control roundss" name="last_name" minlength="7"
                                    maxlength="60" onKeyPress="return sololetras(event)" id="last_name"
                                    value='{{ $data->direccion }}' required="true">
                            </div>

                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cedula" class="control-label mb-1">Cédula:</label>
                                        <input id="cedula" name="cedula" type="text" class="form-control cc-name valid
                                            roundss" minlength="10" maxlength="10" onKeyPress="return soloNumeros(event)"
                                            data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" required="true" value='{{ $data->cedula }}'>
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="celular" class="control-label mb-1">Celular:</label>
                                        <input id="celular" name="celular" type="text"
                                            class="form-control cc-name valid roundss" minlength="7" maxlength="10"
                                            onKeyPress="return soloNumeros(event)" data-val="true"
                                            data-val-required="Please enter the name on card" autocomplete="cc-name"
                                            required="true" value='{{ $data->telefono }}'>
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group has">
                                <label for="email" class="control-label mb-1">Email:</label>
                                <input id="email" name="email" type="email" class="form-control cc-name roundss"
                                    data-val="true" autocomplete="cc-name" value='{{ $data->email }}' minlength="8"
                                    maxlength="60" required="true">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                    data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group has">
                                <label for="direcion" class="control-label mb-1">Fecha de nacimiento:</label>
                                <input id="direcion" name="direcion" type="text" class="form-control cc-name roundss"
                                    data-val="true" autocomplete="cc-name" value='{{ $data->nacimiento }}' minlength="4"
                                    maxlength="60" required="true">
                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                    data-valmsg-replace="true"></span>
                            </div>

                            <!--</fieldset>-->
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

                                <a href="{{ asset($data->image) }}" data-lightbox="mygallery"
                                    data-title="{{ $data->nombre }} {{ $data->apellido }}">
                                    <img class="avatar border-gray" src="{{ asset($data->image) }}" title="ver imagen"
                                        class="img-fluid center" alt="Responsive image"
                                        style="width:150px; height:350px;"></a>
                                <h3 style="font-size: 20px;" class="title">
                                    {{ $data->nombre }}<br> {{ $data->apellido }}
                                </h3>
                            </a>
                            <p class="description">
                                {{ $data->email }}
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
