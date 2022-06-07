@extends('layouts.template')
@section('title', 'Atención al Cliente')
@section('content')

    <div class="card">

        <div class="card-header">
            <div class="alert alert-secondary" role="alert">
                <h1 class="title-it">Atención al cliente</h1>
            </div>
        </div>
        <div class="card-body">

            @if (!empty($error))
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Error!</h4>
                    <p class="mb-0">{{ error }}.</p>
                </div>
            @endif


            <form action="{{ route('novedads.store') }}" method="POST" class="form-control">
                <!--estogenera el token de validacion  -->
                @csrf

                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cedula">Cantacto 1:</label>
                            <input type="text" name="contacto" disabled onKeyPress="return soloNumeros(event)"
                                class="form-control" placeholder="Contacto 1"
                                value="{{ old('contacto', $novedad->cliente->id) }}">

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cedula">Cantacto 1:</label>
                            <input type="text" name="contacto" disabled id="contacto" onKeyPress="return soloNumeros(event)"
                                class="form-control" placeholder="Contacto 1" value="">

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cedula">Cantacto 2:</label>
                            <input type="text" name="contacto1" disabled id="contacto1"
                                onKeyPress="return soloNumeros(event)" class="form-control" placeholder="Contacto 2"
                                value="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="cedula">Correo Electronico:</label>
                            <input type="email" name="email" id="email" disabled class="form-control"
                                placeholder="Correo Electronico" value="">

                        </div>
                    </div>



                </div>

                <div class="form-group">
                    <label for="cedula">Provincia-Cantón: Cdla o Recinto - Dirección:</label>

                    <input type="text" name="cdaorecinto" id="cdaorecinto" disabled class="form-control"
                        placeholder="Cdla o Recinto-Dirección" value="">

                </div>
                <div class="form-group">
                    <label for="gps">GPS:</label>
                    <input type="text" name="gps" id="gps" class="form-control" disabled placeholder="GPS" value="">
                </div>
                <div class="form-group">
                    <label for="horainciar">Fecha y hora de la novedad:</label>
                    <input type="datetime-local" name="horainciar" class="form-control" placeholder="Requirido"
                        value="{{ old('horainciar') }}">
                    @error('horainciar')
                        <div class="alert alert-danger" role="alert">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="novedadopercance">Novedad o Percance:</label>
                    <select class="chosen-select form-control" name="novedadopercance" data-placeholder="Sucursal">
                        <option value="" selected disabled hidden>Seleccione alguna Novedad</option>

                        <option value="1">Instalación</option>
                        <option value="2">Retiro de Equipo</option>
                        <option value="3">Reinstalación</option>
                        <option value="4">Intermitente</option>
                        <option value="5">Lento</option>
                        <option value="6">Desconf. Router</option>
                        <option value="7">Cable. Dañado</option>
                        <option value="8">Problema Equipos</option>
                        <option value="9">Sin servicio</option>
                        <option value="10">Otros</option>

                    </select>
                    @error('novedadopercance')
                        <div class="alert alert-danger" role="alert">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="especificar">Especificar:</label>
                    <textarea rows="5" class="form-control" name="especificar"
                        placeholder="Si elige otros por favor especificar">{{ old('especificar') }}</textarea>

                    @error('especificar')
                        <div class="alert alert-danger" role="alert">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('novedads.index') }}" class="btn btn-danger"><i class="fas fa-reply"></i> Cancelar</a>
                    <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Enviar</button>
                </div>



            </form>
        </div>


    </div>
@endsection
